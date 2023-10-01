<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScopeRequest extends FormRequest
{
    public function prepareForValidation()
    {
        return $this->merge([
            'team_id' => auth()->user()->currentTeam->id,
            'scope_status_id' => 1
        ]);
    }

    public function rules(): array
    {
        return [
            'project_id' => ['required', 'integer'],
            'team_id' => ['required', 'integer'],
            'scope_status_id' => ['required','integer'],
            'title' => ['required', 'string'],
            'overview' => ['nullable', 'string'],
            'business_case' => ['nullable', 'string'],
            'budget' => ['nullable', 'integer'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
