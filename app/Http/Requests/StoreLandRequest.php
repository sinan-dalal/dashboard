<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLandRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "description" => 'sometimes',
            "office_id" => 'required',
            "landscape_id" => 'required',
            "site_description_id" => 'required',
            "nature" => 'required',
            "area" => ['required','numeric'],
            "price" => ['required','numeric'],
            "length" => ['required','numeric'],
            "width" => ['required','numeric'],
            "address" => 'required',
            "tract_no" => 'required',
            "desired_price" => ['required','numeric'],
            "direction_id" => 'required',
            'images' => ['required', 'array'],
            'images.*' => ['required', 'mimes:jpeg,bmp,png'],
            'image' => ['required', 'mimes:jpeg,bmp,png'],
        ];
    }
}
