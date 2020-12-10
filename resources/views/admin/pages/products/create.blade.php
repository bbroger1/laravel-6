@extends('admin.layouts.app')

@section('title', 'Cadastro Produtos')

@section('content')
    <div class="text-center mt-2">
        <h3>Cadastrar um novo produto</h3>
    </div>

    <div class="col mt-2 mb-2" style="text-align: right;">
        <a href="{{ route('products.index') }}" class="btn btn-primary">Listar</a>
    </div>

    <form action="{{ route('products.store')}}" method="post" enctype="multipart/form-data">
        @include('admin.pages.products._partials.form')
    </form>
@endsection
