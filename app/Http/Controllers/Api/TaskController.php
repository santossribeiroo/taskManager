<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Retorna lista de Projetos
     * 
     * Retorna a lista como uma resposta JSON
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {

        // Recupera os Projetos do banco e ordena pelo ID
        $tasks = Task::orderBy('id')->get();

        // Retorna os Projetos recuperados como uma resposta JSON
        return response()->json([
            'status' => true,
            'tasks' => $tasks,
        ], 200);
    }

    /**
     * Exibe detalhes de um Projeto específico
     * 
     * Retorna os detalhes em formato JSON
     * 
     * @param \App\Models\Task
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Task $task): JsonResponse
    {

        // Retorna os detalhes do Projeto em formato JSON
        return response()->json([
            'status' => true,
            'task' => $task,
        ], 200);
    }

    /**
     * Cria novo Projeto com dados da requisição
     * 
     * @param \App\Http\Requests\TaskRequest $request contém os dados do Projeto a ser criado
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TaskRequest $request)
    {
        // Iniciar a transação
        DB::beginTransaction();

        try {

            // Cadastrar Projeto no banco de dados
            $task = Task::create([
                'user_id' => $request->user_id,
                'project_id' => $request->project_id,
                'title' => $request->title,
                'description' => $request->description,
                'priority' => $request->priority,
                'status' => $request->status,
            ]);

            // Operação confirmada
            DB::commit();
            return response()->json([
                'status' => true,
                'task' => $task,
                'message' => 'Tarefa cadastrado com sucesso',
            ], 201);
        } catch (Exception $e) {
            // Operação não é concluída
            DB::rollBack();
            //Retorna mensagem de erro
            return response()->json([
                'status' => false,
                'message' => 'Tarefa não cadastrado'
            ], 400);
        }
    }

    /**
     * Atualizar os dados de um Tarefa existente com dados da requisição
     * 
     * @param \App\Http\Requests\TaskRequest $request contendo os dados da tarefa a ser atualizada
     * @param \App\Models\Task $task tarefa a ser atualizada
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TaskRequest $request, Task $task): JsonResponse
    {

        // Iniciar Transação
        DB::beginTransaction();

        try {

            // Editar o registro no banco de dados
            $task->update([
                'user_id' => $request->user_id,
                'project_id' => $request->project_id,
                'title' => $request->title,
                'description' => $request->description,
                'priority' => $request->priority,
                'status' => $request->status,
            ]);

            // Operação confirmada
            DB::commit();
            return response()->json([
                'status' => true,
                'task' => $task,
                'message' => 'Tarefa atualizada com sucesso',
            ], 200);
        } catch (Exception $e) {
            // Operação não é concluída
            DB::rollBack();
            //Retorna mensagem de erro
            return response()->json([
                'status' => false,
                'message' => 'Tarefa não atualizada'
            ], 400);
        }
    }

    /**
     * Excluir tarefa no banco de dados
     * 
     * @param \App\Models\Task $task tarefa a ser excluído
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Task $task) : JsonResponse {
        try {

            // Apagar o registro no banco de dados
            $task->delete();

            // Retorna os dados da Tarefa apagada
            return response()->json([
                'status' => true,
                'task' => $task,
                'message' => 'Tarefa deletada com sucesso'
            ], 200);

        } catch (Exception $e) {
            //Retorna mensagem de erro
            return response()->json([
                'status' => false,
                'message' => 'Tarefa não deletada'
            ], 400);
        }
    }
}
