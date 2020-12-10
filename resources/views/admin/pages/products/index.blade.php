@extends('admin.layouts.app')

@section('title', 'Gestão de Produtos')
@section('content')
    <div class="text-center mt-2">
        <h3>Produtos Cadastrados</h3>
    </div>
    <div class="row">
        <div class="col-6">
            <form action="{{ route('products.search')}}" method="post" class="form form-inline">
                @csrf
            <input type="text" name="filter" id="filter" value="{{$filter['filter'] ?? ''}}">
                <button class="btn btn-primary" type="submit">Pesquisar</button>
            </form>
        </div>
        <div class="col-6" style="text-align: right;">
            <a href="{{ route('products.create') }}" class="btn btn-success mt-2 mb-2">Cadastrar</a>
        </div>
    </div>


    <!-- include serve para passar conteúdo especifico
        {{-- @include('admin.includes.alerts', ['content' => 'Alerta com include']) --}}
    <hr> -->

    <!-- components e slots fazem mais sentido
    {{-- @component('admin.components.card')
        @slot('title')
            <h1>Título Card</h1>
        @endslot
        Um card de exemplo.
    @endcomponent --}} -->

    <!-- {{-- @if (isset($products))
        @foreach ($products as $product)
            <p class="@if($loop->last) last @endif">Produto: {{$product}}</p></a>
            a impressão com duas chaves protege de ataque xrs e a impressão dessa chave e dois pontos de exclamação mantém o formato indicado no controller
            <p>Produto: {!! $product !!}</p>
        @endforeach
    @endif --}}

    <hr> -->

    <table class="table table-striped text-center">
        <thead>
            <th>Nome</th>
            <th>Preço</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                    <a href="{{ route('products.show', $product->id)}}" class="btn btn-sm btn-primary mr-2">Detalhes</a>
                    <a href="{{ route('products.edit', $product->id)}}" class="btn btn-sm btn-success mr-2">Editar</a>
                </tr>
                @empty
                    <p>Não existem produtos cadastrados.</p>
            @endforelse
        </tbody>
    </table>

@endsection

@section('pagination')
    @if (isset($filter))
        {{ $products->appends($filter)->links() }}
    @else
        {{ $products->links() }}
    @endif
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
        //document.body.style.background = '#efefef';
    </script>
@endpush
