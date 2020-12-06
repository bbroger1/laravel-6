@extends('admin.layouts.app')

@section('title', 'Cadastro Produtos')

@section('content')
    <a href="{{ route('products.index') }}">Listar</a>

    <h1>Cadastrar um novo produto</h1>

    <form action="{{ route('products.store')}}" method="post">
        @csrf
        <input type="text" name="name" id="name" placeholder="Nome:">
        <input type="text" name="description" id="description" placeholder="Descrição:">
        <button type="submit">Cadastrar</button>
    </form>
@endsection
