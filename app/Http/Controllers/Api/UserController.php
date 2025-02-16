<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Retorna lista de usuários
     * 
     * Retorna a lista como uma resposta JSON
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {

        // Recupera os usuários do banco e ordena pelo ID
        $users = User::orderBy('id')->get();

        // Retorna os usuários recuperados como uma resposta JSON
        return response()->json([
            'status' => true,
            'users' => $users,
        ], 200);
    }

    /**
     * Exibe detalhes de um usuário específico
     * 
     * Retorna os detalhes em formato JSON
     * 
     * @param \App\Models\User
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user): JsonResponse
    {

        // Retorna os detalhes do usuário em formato JSON
        return response()->json([
            'status' => true,
            'user' => $user,
        ], 200);
    }

    /**
     * Cria novo usuário com dados da requisição
     * 
     * @param \App\Http\Requests\UserRequest $request contém os dados do usuário a ser criado
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserRequest $request)
    {
        // Iniciar a transação
        DB::beginTransaction();

        try {

            // Cadastrar usuário no banco de dados
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);

            // Operação confirmada
            DB::commit();
            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => 'Usuário cadastrado com sucesso',
            ], 201);
        } catch (Exception $e) {
            // Operação não é concluída
            DB::rollBack();
            //Retorna mensagem de erro
            return response()->json([
                'status' => false,
                'message' => 'Usuário não cadastrado'
            ], 400);
        }
    }

    /**
     * Atualizar os dados de um usuário existente com dados da requisição
     * 
     * @param \App\Http\Requests\UserRequest $request contendo os dados do usuário a ser atualizado
     * @param \App\Models\User $user Usuário a ser atualizado
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UserRequest $request, User $user): JsonResponse
    {

        // Iniciar Transação
        DB::beginTransaction();

        try {

            // Editar o registro no banco de dados
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);

            // Operação confirmada
            DB::commit();
            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => 'Usuário atualizado com sucesso',
            ], 200);
        } catch (Exception $e) {
            // Operação não é concluída
            DB::rollBack();
            //Retorna mensagem de erro
            return response()->json([
                'status' => false,
                'message' => 'Usuário não atualizado'
            ], 400);
        }
    }

    /**
     * Excluir usuário no banco de dados
     * 
     * @param \App\Models\User $user usuário a ser excluído
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user) : JsonResponse {
        try {

            // Apagar o registro no banco de dados
            $user->delete();

            // Retorna os dados do usuário apagado
            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => 'Usuário deletado com sucesso'
            ], 200);

        } catch (Exception $e) {
            //Retorna mensagem de erro
            return response()->json([
                'status' => false,
                'message' => 'Usuário não deletado'
            ], 400);
        }
    }
}
