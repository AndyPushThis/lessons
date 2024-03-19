<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        return [
            'title' => 'required|string|max:250',
            'description' => 'required|string|max:2000',
            'body' => 'required|string|max:2000',
            'cover' => 'required|string|max:250',
            'category_id' => 'required|int|exists:App\Models\Category,id'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Напиши заголовок!!!',
            'description.required' => 'Напиши тексту быльше)',
            'body.required' => 'Тоже тексту більше'
        ];
    }
}
