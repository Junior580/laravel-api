@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Produto</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $service->id }}</li>
        <li class="list-group-item"><strong>Nome:</strong> {{ $service->name }}</li>
        <li class="list-group-item"><strong>Descrição:</strong> {{ $service->description }}</li>
        <li class="list-group-item"><strong>Preço:</strong> R$ {{ number_format($service->price, 2, ',', '.') }}</li>
    </ul>
    <a href="{{ route('services.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection


