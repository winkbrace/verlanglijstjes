<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Verlanglijstjes\Wish;

class UpdateWishRequest extends FormRequest
{
    public function authorize()
    {
        $wish = Wish::find($this->route('id'));

        return $wish !== null && $wish->user_id->equals(user()->id);
    }

    public function rules()
    {
        return [
            'gift' => 'required|string',
            'link' => 'nullable|url'
        ];
    }

    public function messages()
    {
        return [
            'gift.required' => 'Voer een cadeau in',
            'link.url' => 'De link moet een complete url zijn (dus beginnen met http)',
        ];
    }
}
