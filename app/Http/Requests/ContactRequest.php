<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'phone' => ['required'],
            'message' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
