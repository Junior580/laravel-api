@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tenants</h1>

        <a href="{{ route('tenants.create') }}" class="btn btn-primary mb-3">Novo Tenant</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tenants as $tenant)
                    <tr>
                        <td>{{ $tenant->id }}</td>
                        <td>{{ $tenant->name }}</td>
                        <td>{{ $tenant->email }}</td>
                        <td>
                            @if ($tenant->is_active)
                                <span class="badge bg-success">Sim</span>
                            @else
                                <span class="badge bg-danger">Não</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('products.show', $tenant) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('products.edit', $tenant) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('products.destroy', $tenant) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Tem certeza?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Nenhum Tenant encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
