<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current_password' => 'required|current_password',
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'current_password.current_password' => __('auth.password')
        ];
    }
}
