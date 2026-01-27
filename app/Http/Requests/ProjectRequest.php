<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $data = [
            'title' => 'required|string|min:3|max:255',
            'slug' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique('projects', 'slug'),
            ],
            'short_desc' => 'required|string|min:3|max:255',
            'desc' => 'required|string|min:3',
            'image_cover' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            'link' => 'required|string|max:255',
            'github' => 'required|string|max:255',
            'technologies' => 'required|array',
            'technologies.*' => 'string',
            'status' => 'required|boolean',
            'teams' => 'required|array',
            'teams.*' => 'integer|exists:teams,id',
            'service_id' => 'nullable|integer|exists:services,id',
        ];

        if ($this->method() == 'PUT') {
            $data['title'] = 'sometimes|string|min:3|max:255';
            $data['slug'] = [
                'sometimes',
                'string',
                'min:3',
                'max:255',
                Rule::unique('projects', 'slug')->ignore($this->route('project') ?? $this->route('id')),
            ];
            $data['short_desc'] = 'sometimes|string|min:3|max:255';
            $data['desc'] = 'sometimes|string|min:3';
            $data['image_cover'] = 'sometimes|image|mimes:jpg,jpeg,png,webp|max:2048';
            $data['images'] = 'sometimes|array';
            $data['images.*'] = 'sometimes|image|mimes:jpg,jpeg,png,webp|max:2048';
            $data['link'] = 'sometimes|string|max:255';
            $data['github'] = 'sometimes|string|max:255';
            $data['technologies'] = 'sometimes|array';
            $data['technologies.*'] = 'sometimes|string';
            $data['status'] = 'sometimes|boolean';
            $data['teams'] = 'sometimes|array';
            $data['teams.*'] = 'sometimes|integer|exists:teams,id';
            $data['service_id'] = 'sometimes|nullable|integer|exists:services,id';
        }

        return $data;
    }
}
