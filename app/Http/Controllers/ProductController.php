<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $request, $user;

    public function __construct(Request $request)
    {
        //fazendo essa chamada no construct eu não preciso instanciar ou injetar o Request a cada necessidade
        $this->request = $request;

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
            'destroy'
        ]);
    }

    public function index()
    {
        $products = [
            'TV',
            'Geladeira',
            'Fogão',
        ];

        return view('admin.pages.products.index', compact('products'));
    }

    public function show($id)
    {
        $products = [
            'TV',
            'Geladeira',
            'Fogão',
        ];
        $id = $id - 1;

        if (isset($products[$id])) {
            $product = $products[$id];
            return view('admin.pages.products.show', compact('product'));
        }

        $msg = "Produto não encontrado.";
        return view('admin.pages.products.show', compact('msg'));
    }

    public function create()
    {
        return view('admin.pages.products.create');
    }

    //injeção de dependência transforma a instanciação do objeto no parâmetro da função
    public function store(Request $request)
    {
        return 'Cadastrando o produto: ' . $request->name;
    }

    public function edit($id)
    {
        return view('admin.pages.products.edit', compact('id'));
    }

    public function update($id)
    {
        return 'Editando o produto: ' . $id;
    }

    public function destroy($id)
    {
        return 'Deletar o produto: ' . $id;
    }
}
