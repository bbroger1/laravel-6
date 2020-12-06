@extends('admin.layouts.app')

@section('title', 'Produto')
@section('content')
    @isset($product)
        Detalhe do produto: {{ $product}}
    @else
        {{ $msg}}
    @endisset
@endsection
