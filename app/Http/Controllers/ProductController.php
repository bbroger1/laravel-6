<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $request, $user;
    private $repository;

    public function __construct(Request $request, Product $product)
    {
        //fazendo essa chamada no construct eu não preciso instanciar ou injetar o Request a cada necessidade
        $this->request = $request;
        $this->repository = $product;

        //o middleware pode ser passado direto no controller - não é boa pratica
        //$this->middleware('auth');
        //pode aplicar o middleware em alguns metodos optando por indicar aqueles onde será aplicado (only)
        /*$this->middleware('auth')->only([
            'create', 'store'
        ]);*/

        //ou aqueles onde não será aplicado except
        $this->middleware('auth')->except([
            'index',
            'show',
            'create',
            'store',
            'edit',
            'update',
            'destroy',
            'search'
        ]);
    }

    public function index()
    {
        $products = $this->repository::paginate(5);

        return view('admin.pages.products.index', compact('products'));
    }

    public function show($id)
    {
        if (!$product = $this->repository::where('id', $id)->first()) {
            return redirect()->back();
        }

        return view('admin.pages.products.show', compact('product'));
    }

    public function create()
    {
        return view('admin.pages.products.create');
    }

    //injeção de dependência transforma a instanciação do objeto no parâmetro da função
    public function store(StoreUpdateProductRequest $request)
    {

        //metódo para retornar todos os campos do request
        //dd($request->all());
        //metódo para retornar os campos determinados pelo desenvolvedor
        //dd($request->only(['name']));
        //dd($request->except(['_token']));
        //metódo para retornar o valor de um campo
        //dd($request->name);
        //metódo para retornar true ou false
        //dd($request->has('name'));
        //metódo para retornar o valor de name ou valor default
        //dd($request->input('name', 'valor default'));

        //validações, a melhor forma é com form request
        /*$request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'nullable|min:3|max:1000',
            'photo' => 'required|image'
        ]);*/

        /*
        //upload de arquivos
        if ($request->file('photo')->isValid()) {
            //com esse comando o laravel determina o nome
            //dd($request->file('photo')->store('products'));

            //podemos determinar o nome do arquivo
            $nameFile = $request->name . '.' . $request->file('photo')->extension();
            dd($request->file('photo')->storeAs('products', $nameFile));
        }*/

        //passando array com parametro do create
        $product = $request->only('name', 'description', 'price');
        Product::create($product);

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        if (!$product = $this->repository::find($id)) {
            return redirect()->back();
        }
        return view('admin.pages.products.edit', compact('product'));
    }

    public function update(StoreUpdateProductRequest $request, $id)
    {
        if (!$product = $this->repository::find($id)) {
            return redirect()->back();
        }

        $product->update($request->all());
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        if (!$product = $this->repository::find($id)) {
            return redirect()->back();
        }

        $product->delete();
        return redirect()->route('products.index');
    }

    public function search(Request $request)
    {
        $filter = $request->except('_token');
        $products = $this->repository->search($request->filter);
        return view('admin.pages.products.index', compact(['products', 'filter']));
    }
}
