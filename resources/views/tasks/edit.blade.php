@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Editar tarefa</h2>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" required>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea name="description" id="description" class="form-control">{{ $task->description }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="priority" class="form-label">Prioridade</label>
                <select name="priority" id="priority" class="form-select" required>
                    <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Baixa</option>
                    <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>Média</option>
                    <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>Alta</option>
                </select>
                @error('priority')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@endsection
