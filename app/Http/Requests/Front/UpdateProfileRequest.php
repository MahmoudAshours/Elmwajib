<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . auth()->id(),
            'country' => 'nullable',
            'gender' => 'nullable',
            'thumbnail' => 'max:2048',
        ];
    }
}
