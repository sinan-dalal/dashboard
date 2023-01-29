<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOfficeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => ['sometimes', 'string'],
            'phone_number' => ['sometimes', 'string'],
            'verified' => ['sometimes', 'string'],
            'email' => ['sometimes', 'email'],
            'image' => ['sometimes', 'image', 'mimes:jpeg,bmp,png'],
        ];
    }
}
