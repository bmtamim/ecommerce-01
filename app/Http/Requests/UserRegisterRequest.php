<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    protected $errorBag = 'userRegister';
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
            'name'            => ['required', 'string'],
            'email'           => ['required', 'email', 'unique:users'],
            'phone'           => ['required', 'string', 'unique:users'],
            'password'        => ['required', 'string', 'min:3'],
            'confirmPassword' => ['required', 'string', 'min:3', 'same:password'],
        ];
    }
}
