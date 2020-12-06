@extends('admin.layouts.app')

@section('title', 'Gestão de Produtos')
@section('content')
    <a href="{{ route('products.create') }}">Cadastrar</a>

    <h1>Produtos Cadastrados</h1>

    <!-- include serve para passar conteúdo especifico -->
    @include('admin.includes.alerts', ['content' => 'Alerta com include'])

    <hr>

    <!-- components e slots fazem mais sentido -->
    @component('admin.components.card')
        @slot('title')
            <h1>Título Card</h1>
        @endslot
        Um card de exemplo.
    @endcomponent

    <hr>
    @if (isset($products))
        @foreach ($products as $product)
            <p class="@if($loop->last) last @endif">Produto: {{$product}}</p></a>
            <!-- a impressão com duas chaves protege de ataque xrs e a impressão dessa chave e dois pontos de exclamação mantém o formato indicado no controller
            <p>Produto: {!! $product !!}</p>-->
        @endforeach
    @endif

    <hr>

    @forelse ($products as $product)
        <p class="@if($loop->first) first @endif">Produto: {{$product}}</p>
    @empty
        <p>Não existem produtos cadastrados.</p>
    @endforelse

@endsection

@push('styles')
    <style>
        .last {
            background: #CCC;
        }
        .first {
            background: rgb(150, 233, 194);
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.body.style.background = '#efefef';
    </script>
@endpush
