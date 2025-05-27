<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthPostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<mixed>|\Illuminate\Contracts\Validation\ValidationRule|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:40',

        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Nome',
        ];
    }
}
