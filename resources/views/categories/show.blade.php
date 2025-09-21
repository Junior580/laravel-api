@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Categoria</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $category->id }}</li>
        <li class="list-group-item"><strong>Nome:</strong> {{ $category->name }}</li>
    </ul>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection

