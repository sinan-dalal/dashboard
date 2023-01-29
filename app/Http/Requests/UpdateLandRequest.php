<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLandRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "description" => 'sometimes',
            "landscape_id" => 'sometimes',
            "site_description_id" => 'sometimes',
            "nature" => 'sometimes',
            "area" => ['sometimes','numeric'],
            "price" => ['sometimes','numeric'],
            "length" =>['sometimes','numeric'],
            "width" => ['sometimes','numeric'],
            "address" => 'sometimes',
            "tract_no" => 'sometimes',
            "desired_price" => ['sometimes','numeric'],
            "direction_id" => 'sometimes',
            'images' => ['sometimes', 'array'],
            'images.*' => ['sometimes', 'image', 'mimes:jpeg,bmp,png'],
            'image' => ['sometimes', 'image', 'mimes:jpeg,bmp,png'],
        ];
    }
}
