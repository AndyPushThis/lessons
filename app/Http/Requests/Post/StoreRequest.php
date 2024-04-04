<?php

namespace App\Http\Requests\Post;

use App\Http\Requests\Common\BaseRequest;

class StoreRequest extends BaseRequest
{
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
