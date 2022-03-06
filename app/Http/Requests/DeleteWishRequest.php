<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Verlanglijstjes\Wish;

class DeleteWishRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $wish = Wish::find($this->route('id'));

        return $wish !== null && $wish->user_id->equals(user()->id);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
