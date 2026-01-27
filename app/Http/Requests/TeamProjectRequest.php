<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $data = [
            'team_id' => 'required|integer|exists:teams,id',
            'project_id' => 'required|integer|exists:projects,id',
        ];

        if ($this->method() == 'PUT') {
            $data['team_id'] = 'sometimes|integer|exists:teams,id';
            $data['project_id'] = 'sometimes|integer|exists:projects,id';
        }

        return $data;
    }
}
