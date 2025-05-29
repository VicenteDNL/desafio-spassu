<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookPostRequest extends FormRequest
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
            'title'            => 'required|string|max:40',
            'publisher'        => 'required|string|max:40',
            'edition'          => 'required|integer|min:1',
            'year_publication' => 'required|integer|digits:4|max:' . date('Y'),
            'amount'           => ['required', 'regex:/^(\d{1,3}(\.\d{3})*|\d+)(,\d{2})?$/'],
            'authors'          => 'nullable|array',
            'authors.*'        => 'integer',
            'subjects'         => 'nullable|array',
            'subjects.*'       => 'integer',

        ];
    }

    public function attributes(): array
    {
        return [
            'title'            => 'Título',
            'publisher'        => 'Editora',
            'edition'          => 'Edição',
            'year_publication' => 'Ano publicação',
            'amount'           => 'Preço',
            'authors'          => 'Autores',
            'subjects'         => 'Assuntos',

        ];
    }

    public function validated($key = null, $default = null)
    {
        $data = parent::validated($key, $default);
        $data['authors'] = $this->input('authors', []);
        $data['subjects'] = $this->input('subjects', []);
        $data['amount'] = str_replace(',', '.', str_replace('.', '', $data['amount']));
        return $data;
    }
}
