<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends StoreRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $parentRules = parent::rules();
        $parentRules['slug'] = ['required', 'max:250',
            Rule::unique('posts')
                ->ignore($this->id)
        ];

        $parentRules['slug'] = ['nullable'];

        return $parentRules;
    }

    protected function prepareForValidation(): void
    {

    }
}
