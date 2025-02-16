<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\projectRequest;
use App\Models\Project;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
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
        $projects = Project::orderBy('id')->get();

        // Retorna os Projetos recuperados como uma resposta JSON
        return response()->json([
            'status' => true,
            'projects' => $projects,
        ], 200);
    }

    /**
     * Exibe detalhes de um Projeto específico
     * 
     * Retorna os detalhes em formato JSON
     * 
     * @param \App\Models\Project
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Project $project): JsonResponse
    {

        // Retorna os detalhes do Projeto em formato JSON
        return response()->json([
            'status' => true,
            'project' => $project,
        ], 200);
    }

    /**
     * Cria novo Projeto com dados da requisição
     * 
     * @param \App\Http\Requests\ProjectRequest $request contém os dados do Projeto a ser criado
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(projectRequest $request)
    {
        // Iniciar a transação
        DB::beginTransaction();

        try {

            // Cadastrar Projeto no banco de dados
            $project = Project::create([
                'user_id' => $request->user_id,
                'name' => $request->name,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => $request->status,
            ]);

            // Operação confirmada
            DB::commit();
            return response()->json([
                'status' => true,
                'project' => $project,
                'message' => 'Projeto cadastrado com sucesso',
            ], 201);
        } catch (Exception $e) {
            // Operação não é concluída
            DB::rollBack();
            //Retorna mensagem de erro
            return response()->json([
                'status' => false,
                'message' => 'Projeto não cadastrado'
            ], 400);
        }
    }

    /**
     * Atualizar os dados de um Projeto existente com dados da requisição
     * 
     * @param \App\Http\Requests\ProjectRequest $request contendo os dados do Projeto a ser atualizado
     * @param \App\Models\Project $project Projeto a ser atualizado
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ProjectRequest $request, Project $project): JsonResponse
    {

        // Iniciar Transação
        DB::beginTransaction();

        try {

            // Editar o registro no banco de dados
            $project->update([
                'user_id' => $request->user_id,
                'name' => $request->name,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => $request->status,
            ]);

            // Operação confirmada
            DB::commit();
            return response()->json([
                'status' => true,
                'project' => $project,
                'message' => 'Projeto atualizado com sucesso',
            ], 200);
        } catch (Exception $e) {
            // Operação não é concluída
            DB::rollBack();
            //Retorna mensagem de erro
            return response()->json([
                'status' => false,
                'message' => 'Projeto não atualizado'
            ], 400);
        }
    }

    /**
     * Excluir Projeto no banco de dados
     * 
     * @param \App\Models\Project $project Projeto a ser excluído
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Project $project) : JsonResponse {
        try {

            // Apagar o registro no banco de dados
            $project->delete();

            // Retorna os dados do Projeto apagado
            return response()->json([
                'status' => true,
                'project' => $project,
                'message' => 'Projeto deletado com sucesso'
            ], 200);

        } catch (Exception $e) {
            //Retorna mensagem de erro
            return response()->json([
                'status' => false,
                'message' => 'Projeto não deletado'
            ], 400);
        }
    }
}
