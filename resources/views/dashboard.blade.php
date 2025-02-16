@extends('layouts.app')
@section('title')
    Painel
@endsection
@section('content')
<div class="container">
    <h2>Bem vindo ao painel de controle</h2>
    <p>Aqui você pode gerenciar suas tarefas, rotinas, anotações e arquivos</p>

    <div class="row mb-4">
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Tarefas</h5>
                    <p class="card-text flex-grow-1">Você tem <strong>{{ $tasksCount }}</strong> tarefas pendentes</p>
                    <a href="{{ route('projects.index') }}" class="btn btn-primary mt-auto">Ver</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Tarefas recentes</h5>
                    <ul class="list-group flex-grow-1">
                        @foreach($recentTasks as $task)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $task->title }}
                            <span class="badge bg-primary rounded-pill">{{ $task->status == 'to_do' ? 'A fazer' : 'Em progresso' }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection