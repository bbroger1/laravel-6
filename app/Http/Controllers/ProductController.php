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
            'show'
        ]);
    }

    public function index()
    {
        $products = [
            'Produtos 1',
            'Produtos 2',
            'Produtos 3',
        ];

        return $products;
    }

    public function show($id)
    {
        $products = [
            'Produtos 1',
            'Produtos 2',
            'Produtos 3',
        ];
        $id = $id - 1;

        if (isset($products[$id])) {
            $product = $products[$id];
            return 'Página do ' . $product;
        }

        return "Produto não encontrado.";
    }

    public function create()
    {
        return 'Exibindo o formulário de cadastro';
    }

    //injeção de dependência transforma a instanciação do objeto no parâmetro da função
    public function store(Request $request)
    {
        return 'Cadastrar o produto';
    }

    public function edit($id)
    {
        return 'Exibindo o formulário de edição do produto: ' . $id;
    }

    public function update($id)
    {
        return 'Editar o produto: ' . $id;
    }

    public function destroy($id)
    {
        return 'Deletar o produto: ' . $id;
    }
}
