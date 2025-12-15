<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            'email' => ['required', 'email:rfc,dns', Rule::unique('users', 'email')->ignore($this->user?->id)],
            'password' => ['nullable', Rule::requiredIf(!$this->user)],
            'thumbnail' => 'max:1024',
        ];
    }
}
