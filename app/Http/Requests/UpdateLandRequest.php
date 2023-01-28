<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLandRequest extends FormRequest
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
            "description" => 'sometimes',
            "landscape_id" => 'sometimes',
            "site_description_id" => 'sometimes',
            "nature" => 'sometimes',
            "area" => 'sometimes',
            "price" => 'sometimes',
            "length" => 'sometimes',
            "width" => 'sometimes',
            "address" => 'sometimes',
            "tract_no" => 'sometimes',
            "desired_price" => 'sometimes',
            "direction_id" => 'sometimes',
            'images' => ['sometimes', 'array'],
            'images.*' => ['sometimes','image', 'mimes:jpeg,bmp,png'],
            'image' => ['sometimes','image', 'mimes:jpeg,bmp,png'],
            ];
    }
}
