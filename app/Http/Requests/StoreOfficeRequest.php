<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfficeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string'],
            'phone_number' => ['required', 'string'],
            'verified' => ['required', 'string'],
            'email' => ['required', 'email'],
            'image' => ['required','image'],
        ];
    }
}
