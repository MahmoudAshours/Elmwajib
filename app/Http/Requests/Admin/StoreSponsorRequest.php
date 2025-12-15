<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSponsorRequest extends FormRequest
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
            'url' => 'nullable|url',
            'thumbnail' => ['max:1024', Rule::requiredIf(!($this->sponsor && !$this->thumbnail_remove))],
        ];
    }
}
