<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLandRequest extends FormRequest
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
            "office_id" => 'required',
            "landscape_id" => 'required',
            "site_description_id" => 'required',
            "nature" => 'required',
            "area" => 'required',
            "price" => 'required',
            "length" => 'required',
            "width" => 'required',
            "address" => 'required',
            "tract_no" => 'required',
            "desired_price" => 'required',
            "direction_id" => 'required',
            'images' => ['required', 'array'],
            'images.*' => ['required', 'mimes:jpeg,bmp,png'],
            'image' => ['required', 'mimes:jpeg,bmp,png'],
        ];
    }
}
