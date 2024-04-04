<?php

namespace App\Http\Requests\Tag;

use App\Http\Requests\Common\BaseRequest;

class IdArrayRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tags' => 'array',
            'tags.*' => 'int|exists:App\Models\Tag,id'
        ];
    }
}
