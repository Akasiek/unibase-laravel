<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class LectureRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'date' => ['required', 'date'],
            'subject_id' => ['required', 'exists:subjects,id'],

            'summary' => ['nullable', 'string'],
            'notion_link' => ['nullable', 'string', 'url'],

            'videos' => ['nullable', 'array'],
            'videos.*.youtube_link' => ['required', 'url'],
        ];
    }

    public function authorize(): bool
    {
        return Auth::check();
    }
}
