@extends('admin.layouts.app')

@section('title', 'Editar Produtos')

@section('content')
    <a href="{{ route('products.index') }}">Listar</a>

    <h1>Editar um novo produto {{$id}}</h1>

    <form action="{{ route('products.update', $id)}}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="name" id="name" placeholder="Nome:">
        <input type="text" name="description" id="description" placeholder="Descrição:">
        <button type="submit">Editar</button>
    </form>
@endsection
