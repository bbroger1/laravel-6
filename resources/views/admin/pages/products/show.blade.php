@extends('admin.layouts.app')

@section('title', 'Produto')
@section('content')
    <div class="col" style="text-align: right;">
        <a href="{{ route('products.index') }}" class="btn btn-primary mt-2 mb-2">Listar</a>
        <a href="{{ route('products.create') }}" class="btn btn-success mt-2 mb-2 ml-2">Cadastrar</a>
    </div>
    @isset($product)
        <div class="text-center">
            <h3>Detalhe do produto: {{ $product->name }}</h3>
        </div>
        <ul>
            <li><strong>Nome: </strong>{{ $product->name }}</li>
            <li><strong>Preço: </strong>{{ $product->price }}</li>
            <li><strong>Descrição: </strong>{{ $product->description }}</li>
            <li><strong>Imagem: </strong> <img src="" alt=""></li>
        </ul>
    @else
        Produto não encontrado.
    @endisset
    <div class="text-center">
        <form action="{{ route('products.destroy', $product->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-2 mb-2 ml-2">Excluir</button>
        </form>
    </div>
@endsection
