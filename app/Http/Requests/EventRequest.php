<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'date' => ['sometimes', 'date'],
            'info' => ['sometimes'],
            'event_type_id' => ['required', 'exists:event_types,id'],
            'subject_id' => ['sometimes', 'exists:subjects,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
