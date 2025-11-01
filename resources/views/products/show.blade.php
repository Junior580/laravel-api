@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes do Produto</h1>
        <ul class="list-group">
            <li class="list-group-item"><strong>ID:</strong> {{ $product->id }}</li>
            <li class="list-group-item"><strong>Nome:</strong> {{ $product->name }}</li>
            <li class="list-group-item"><strong>Preço:</strong> R$ {{ number_format($product->price, 2, ',', '.') }}</li>
            <li class="list-group-item"><strong>Estoque:</strong> {{ $product->stock }}</li>
            <li class="list-group-item"><strong>Categoria:</strong> {{ $product->category->name ?? 'Sem categoria' }}</li>
        </ul>
        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection
