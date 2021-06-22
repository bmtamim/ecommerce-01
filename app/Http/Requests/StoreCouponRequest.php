<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCouponRequest extends FormRequest
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
            'name'                       => ['required', 'string'],
            'code'                       => ['required', 'string'],
            'description'                => ['nullable', 'string'],
            'discount_type'              => ['required', 'string'],
            'discount_amount'            => ['required', 'string'],
            'coupon_enable'              => ['nullable', 'string'],
            'coupon_expiry'              => ['required', 'string'],
            'minimum_spend'              => ['nullable', 'integer'],
            'maximum_spend'              => ['nullable', 'integer'],
            'individual_use'             => ['nullable', 'string'],
            'exclude_sale'               => ['nullable', 'string'],
            'product_ids'                => ['nullable', 'string'],
            'exclude_product_ids'        => ['nullable', 'string'],
            'product_categories'         => ['nullable', 'string'],
            'exclude_product_categories' => ['nullable', 'string'],
            'customer_email'             => ['nullable', 'email'],
            'usage_limit'                => ['nullable', 'integer'],
            'usage_limit_per_user'       => ['nullable', 'string'],
        ];
    }
}
