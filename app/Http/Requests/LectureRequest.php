<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LectureRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'notion_link' => ['nullable'],
            'date' => ['required', 'date'],
            'summary' => ['required'],
            'videos' => ['nullable', 'array'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
