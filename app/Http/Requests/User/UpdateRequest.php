<?php

namespace App\Http\Requests\User;

use App\Enums\UserRoleEnum;
use App\Http\Requests\Common\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email',
            'role' => ['required', 'int', new Enum(UserRoleEnum::class)]
        ];
    }
}
