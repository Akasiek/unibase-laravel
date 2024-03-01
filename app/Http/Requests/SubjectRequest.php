<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'unique:subjects,name', 'max:255'],
            // Can only be a valid HEX color
            'color' => ['nullable', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
            'archived_at' => ['nullable', 'date'],
        ];

        if ($this->isMethod('patch') || $this->isMethod('put')) {
            $rules['name'][1] = 'unique:subjects,name,' . $this->route('subject')->id;
        }

        if ($this->isMethod('patch')) {
            $rules['name'][0] = 'sometimes';
        }

        return $rules;
    }

    public function authorize(): bool
    {
        return Auth::check();
    }
}
