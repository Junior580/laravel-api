@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Usuário</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $user->id }}</li>
        <li class="list-group-item"><strong>Nome:</strong> {{ $user->name }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
    </ul>
    <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection

