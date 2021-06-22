<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class HomeSliderRequest extends FormRequest
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
        $imageReqRule = 'required';
        if ($this->route()->parameter('home_slider')){
            $imageReqRule = 'nullable';
        }
        return [
            'title'       => ['required', 'string'],
            'sub_title'   => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'image'       => [$imageReqRule, 'image', 'mimes:png,jpg,gif,jpeg,svg'],
            'btn_text'    => ['nullable', 'string'],
            'btn_link'    => ['nullable', 'string'],
            'status'      => ['nullable', 'string', 'max:10'],
        ];
    }
}
