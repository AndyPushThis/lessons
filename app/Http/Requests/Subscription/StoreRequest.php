<?php

namespace App\Http\Requests\Subscription;

use App\Http\Requests\Common\BaseRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'author_id' => [
                'required',
                'int',
                'exists:App\Models\User,id',
                Rule::unique('subscriptions', 'author_id')
                    ->where('reader_id', auth()->id())
            ],
            'reader_id' => 'required|int'
            //
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'reader_id' => auth()->id()
        ]);
    }

}
