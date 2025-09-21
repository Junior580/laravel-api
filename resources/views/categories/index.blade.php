@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Categorias</h1>

    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Nova Categoria</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th><th>Nome</th><th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.show', $category) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3">Nenhuma categoria encontrada.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

