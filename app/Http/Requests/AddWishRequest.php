<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * FormRequest for adding or editing a wish.
 */
class AddWishRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
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
