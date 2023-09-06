<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation(): ProjectRequest
    {
        return $this->merge([
            'created_by' => auth()->user()->id,
            'team_id' => auth()->user()->currentTeam->id,
        ]);
    }

    public function rules(): array
    {
        return [
            'team_id' => ['required', 'integer'],
            'created_by' => ['required', 'integer'],
            'test_url' => ['nullable', 'string'],
            'url' => ['nullable', 'string'],
            'repo' => ['nullable', 'string'],
            'name' => ['required'],
        ];
    }
}
