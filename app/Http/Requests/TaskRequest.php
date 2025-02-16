<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Manipular falha de validação e retornar JSON com erros
     * 
     * @param \Illuminate\Contracts\Validation\Validator $validator = contém os erros de validação
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'erros' => $validator->errors(),
        ], 422));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Recuperar o ID do usuário
        $taskId = $this->route('task');
        return [
            'user_id' => 'required',
            'project_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'priority' => 'required',
            'status' => 'required',
        ];
    }

    /**
     * Retorna mensagens de erro
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'user_id.required' => 'ID do usuário responsável pela tarefa é obrigatório!',
            'project_id.required' => 'ID do projeto é obrigatório!',
            'title.required' => 'Título da tarefa é obrigatório!',
            'description.required' => 'Descrição da tarefa é obrigatória!',
            'priority.required' => 'Prioridade da tarefa é obrigatório!',
            'status.required' => 'Status da tarefa é obrigatório!'
        ];
    }
}
