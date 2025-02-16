@extends('layouts.app')
@section('title')
    {{ $project->name }} Editar projeto
@endsection
@section('content')
    <div class="container">
        <h2 class="mb-4 shadow-sm p-3 rounded bg-white">Editar projeto</h2>
        <div class="card border-0 shadow-sm m-auto" style="max-width: 600px;">
            <div class="card-body">
                <form action="{{ route('projects.update', $project->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $project->name }}"
                            required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrição</label>
                        <textarea name="description" id="description" class="form-control">{{ $project->description }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Data inicial</label>
                        <input type="date" name="start_date" id="start_date" class="form-control"
                               value="{{ \Carbon\Carbon::parse($project->start_date)->format('Y-m-d') }}">
                        @error('start_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">Data final</label>
                        <input type="date" name="end_date" id="end_date" class="form-control"
                               value="{{ \Carbon\Carbon::parse($project->end_date)->format('Y-m-d') }}">
                        @error('end_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="not_started" {{ $project->status == 'not_started' ? 'selected' : '' }}>Não iniciada</option>
                            <option value="in_progress" {{ $project->status == 'in_progress' ? 'selected' : '' }}>Em progresso</option>
                            <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completa</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
