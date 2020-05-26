<?php

namespace App\Http\Requests;

use App\Rules\PasswordUpdateRule;
use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old-password' => ['required', new PasswordUpdateRule],
            'password' => 'required|string|min:6|confirmed',
        ];
    }
}
