<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

// Login
Route::post('login', [LoginController::class, 'login'])->name('login'); //{ "email": "lucas@exemplo.com", "password": "secret" }

// Rota restrita
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/users', [UserController::class, 'index']); // GET - http://localhost:8000/api/users - Listar usuários e registros
    Route::get('/users/{user}', [UserController::class, 'show']); // GET - http://localhost:8000/api/users/1 - Listar os registros de um usuário
    Route::post('/register', [UserController::class, 'store']); // POST - http://localhost:8000/api/register - Cadastrar um usuário
    Route::put('/users/{user}', [UserController::class, 'update']); // PUT - http://localhost:8000/api/users/1 - Atualizar um usuário
    Route::delete('/users/{user}', [UserController::class, 'destroy']); // DELETE - http://localhost:8000/api/users/1 - Deletar um usuário

    Route::get('/projects', [ProjectController::class, 'index']); 
    Route::get('/projects/{project}', [ProjectController::class, 'show']); 
    Route::post('/registerProject', [ProjectController::class, 'store']); 
    Route::put('/projects/{project}', [ProjectController::class, 'update']); 
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy']); 

    Route::get('/tasks', [TaskController::class, 'index']); 
    Route::get('/tasks/{task}', [TaskController::class, 'show']); 
    Route::post('/registerTask', [TaskController::class, 'store']); 
    Route::put('/tasks/{task}', [TaskController::class, 'update']); 
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);

    Route::post('/logout/{user}', [LoginController::class, 'logout']); // POST - http://localhost:8000/api/users/logout/1 - Logout
});
