<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CatgeoryRequest extends FormRequest
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
            'name_bn' => ['required', 'string', 'min:2'],
            'parent_id' => ['nullable', 'integer'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,gif,jpeg', 'min:1'],
            'status' => ['nullable', 'max:10'],
        ];
    }
}
