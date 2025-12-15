<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreLessonRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'summary' => 'nullable',
            'examples_of_evidence' => 'nullable',
            'explanation' => 'nullable',
            'activities' => 'nullable',
            'topic_id' => 'required:exists:topics,id',
            'parent_id' => 'nullable|exists:lessons,id',
            'thumbnail' => 'max:1024',
            'pdf' => 'nullable|mimes:pdf',
            'learning_islam_url' => 'url|starts_with:https://learningislam.com|nullable',
        ];
    }

    public function messages () : array
    {
        return[
            'learning_islam_url.starts_with' => 'يجب ان يكون الرابط من منصة تاء',
        ];
    }
}
