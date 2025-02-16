<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProjectRequest extends FormRequest
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
        $projectId = $this->route('project');
        return [
            'user_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
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
            'user_id.required' => 'ID do usuário responsável pelo projeto é obrigatório!',
            'name.required' => 'Nome do projeto é obrigatório!',
            'description.required' => 'Descrição do projeto é obrigatório!',
            'start_date.required' => 'Data inicial do projeto é obrigatória!',
            'end_date.required' => 'Data final projeto é obrigatório!',
            'status.required' => 'Status do projeto é obrigatório!'
        ];
    }
}
