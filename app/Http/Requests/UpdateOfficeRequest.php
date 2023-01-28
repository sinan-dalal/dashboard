<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOfficeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'full_name' => ['sometimes', 'string'],
            'phone_number' => ['sometimes', 'string'],
            'verified' => ['sometimes', 'string'],
            'email' => ['sometimes', 'email'],
            'image' => ['sometimes','image', 'mimes:jpeg,bmp,png'],
        ];
    }
}
