@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Serviços</h1>

    <a href="{{ route('services.create') }}" class="btn btn-primary mb-3">Novo Produto</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->name }}</td>
                    <td>R$ {{ number_format($service->price, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('services.show', $service) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('services.edit', $service) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('services.destroy', $service) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">Nenhum serviço encontrado.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
