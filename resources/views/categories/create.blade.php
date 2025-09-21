@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nova Categoria</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" required>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection

