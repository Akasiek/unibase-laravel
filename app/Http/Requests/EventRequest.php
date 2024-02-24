<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'date' => ['required', 'date'],
            'info' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
