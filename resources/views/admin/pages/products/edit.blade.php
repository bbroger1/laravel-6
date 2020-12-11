@extends('admin.layouts.app')

@section('title', 'Editar Produtos')

@section('content')
    <div class="text-center mt-2">
        <h3>Editar o produto {{$product->name}}</h3>
    </div>

    <div class="col" style="text-align: right;">
        <a href="{{ route('products.index') }}" class="btn btn-primary mt-2 mb-2">Listar</a>
        <a href="{{ route('products.create') }}" class="btn btn-success mt-2 mb-2 ml-2">Cadastrar</a>
    </div>

    <form action="{{ route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.pages.products._partials.form')
    </form>
@endsection
