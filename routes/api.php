<?php

use App\Http\Controllers\Api\ApiLoginController;
use App\Http\Controllers\Api\ApiProjectController;
use App\Http\Controllers\Api\ApiTaskController;
use App\Http\Controllers\Api\ApiUserController;
use Illuminate\Support\Facades\Route;

// Login
Route::post('login', [ApiLoginController::class, 'login'])->name('login'); //{ "email": "lucas@exemplo.com", "password": "secret" }

// Rota restrita
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/users', [ApiUserController::class, 'index']); // GET - http://localhost:8000/api/users - Listar usuários e registros
    Route::get('/users/{user}', [ApiUserController::class, 'show']); // GET - http://localhost:8000/api/users/1 - Listar os registros de um usuário
    Route::post('/register', [ApiUserController::class, 'store']); // POST - http://localhost:8000/api/register - Cadastrar um usuário
    Route::put('/users/{user}', [ApiUserController::class, 'update']); // PUT - http://localhost:8000/api/users/1 - Atualizar um usuário
    Route::delete('/users/{user}', [ApiUserController::class, 'destroy']); // DELETE - http://localhost:8000/api/users/1 - Deletar um usuário

    Route::get('/projects', [ApiProjectController::class, 'index']); 
    Route::get('/projects/{project}', [ApiProjectController::class, 'show']); 
    Route::post('/registerProject', [ApiProjectController::class, 'store']); 
    Route::put('/projects/{project}', [ApiProjectController::class, 'update']); 
    Route::delete('/projects/{project}', [ApiProjectController::class, 'destroy']); 

    Route::get('/tasks', [ApiTaskController::class, 'index']); 
    Route::get('/tasks/{task}', [ApiTaskController::class, 'show']); 
    Route::post('/registerTask', [ApiTaskController::class, 'store']); 
    Route::put('/tasks/{task}', [ApiTaskController::class, 'update']); 
    Route::delete('/tasks/{task}', [ApiTaskController::class, 'destroy']);

    Route::post('/logout/{user}', [ApiLoginController::class, 'logout']); // POST - http://localhost:8000/api/users/logout/1 - Logout
});
