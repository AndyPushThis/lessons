<?php

namespace App\Http\Requests\Subscription;

use App\Http\Requests\Common\BaseRequest;

class IdRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'author_id' => 'required|int|exists:App\Models\User,id',
            //
        ];
    }
}
