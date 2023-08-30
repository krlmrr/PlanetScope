<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'team_id' => ['required', 'integer'],
            'name' => ['required'], //
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
