<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
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
        $data =
            [
                'title'       => 'required|string|min:3|max:255',
                'description' => 'nullable|string|min:3',
                'start_date'        => 'required|date|before_or_equal:now',
                'end_date'        => 'nullable|date|after_or_equal:start_date',
                'order' => 'nullable|integer|min:0',
            ];

        if ($this->method() == 'PUT') {
            $data['title'] = 'sometimes|string|min:3|max:255';
            $data['description'] = 'sometimes|nullable|string|min:3';
            $data['start_date'] = 'sometimes|date|before_or_equal:now';
            $data['end_date'] = 'sometimes|nullable|date|after_or_equal:start_date';
            $data['order'] = 'sometimes|nullable|integer|min:0';
        }

        return $data;
    }
}
