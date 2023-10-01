<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScopeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'project_id' => ['required', 'integer'],
            'team_id' => ['required', 'integer'], //
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
