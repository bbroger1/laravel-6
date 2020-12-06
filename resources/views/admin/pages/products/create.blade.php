@extends('admin.layouts.app')

@section('title', 'Cadastro Produtos')

@section('content')
    <a href="{{ route('products.index') }}">Listar</a>

    <h1>Cadastrar um novo produto</h1>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <ul>
                <li>
                    {{ $error }}
                </li>
            </ul>
        @endforeach
    @endif
    <form action="{{ route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    <input type="text" name="name" id="name" placeholder="Nome:" value="{{ old('name') }}">
        <input type="text" name="description" id="description" placeholder="Descrição:" value="{{ old('description') }}">
        <input type="file" name="photo" id="photo">
        <button type="submit">Cadastrar</button>
    </form>
@endsection
