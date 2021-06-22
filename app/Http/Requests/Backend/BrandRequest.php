<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:2'],
            'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg,gif', 'max:1024'], //Max Size : 1MB
            'status' => ['nullable', 'string', 'max:10'],
        ];
    }
}
