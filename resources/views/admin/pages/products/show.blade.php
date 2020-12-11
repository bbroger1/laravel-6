@extends('admin.layouts.app')

@section('title', 'Produto')
@section('content')
    @isset($product)
        <div class="text-center mt-2">
            <h3>Detalhe do produto: {{ $product->name }}</h3>
        </div>
        <div class="col" style="text-align: right;">
            <a href="{{ route('products.index') }}" class="btn btn-primary mt-2 mb-2">Listar</a>
            <a href="{{ route('products.create') }}" class="btn btn-success mt-2 mb-2 ml-2">Cadastrar</a>
        </div>
        <ul>
            <li><strong>Nome: </strong>{{ $product->name }}</li>
            <li><strong>Preço: </strong>{{ $product->price }}</li>
            <li><strong>Descrição: </strong>{{ $product->description }}</li>
        <li><strong>Imagem: </strong> <img src="{{ url("storage/{$product->image}")}}" alt="{{ $product->name }}" width='100'></li>
        </ul>
    @else
        Produto não encontrado.
    @endisset
    <div class="text-center">
        <form action="{{ route('products.destroy', $product->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger mt-2 mb-2 ml-2">Excluir</button>
        </form>
    </div>
@endsection
