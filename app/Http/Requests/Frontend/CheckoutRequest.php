<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
    public function rules(): array
    {
        $shipRule = 'nullable';
        if ($this->filled('ship_to_different_address')) {
            $shipRule = 'required';
        }
        $checkOutData = [
            'billing_first_name'        => ['required', 'string'],
            'billing_last_name'         => ['required', 'string'],
            'billing_company_name'      => ['nullable', 'string'],
            'billing_country'           => ['required', 'string'],
            'billing_state'             => ['required', 'string'],
            'billing_city'              => ['nullable', 'string'],
            'billing_address'           => ['required', 'string'],
            'billing_postcode'          => ['nullable', 'string'],
            'billing_phone'             => ['required', 'string'],
            'billing_email'             => ['required', 'email'],
            'payment_method'            => ['required', 'string'],
            'terms'                     => ['nullable', 'string'],
            'ship_to_different_address' => ['nullable', 'string', 'max:15'],
            'shipping_first_name'       => [$shipRule, 'string'],
            'shipping_last_name'        => [$shipRule, 'string'],
            'shipping_company_name'     => ['nullable', 'string'],
            'shipping_country'          => [$shipRule, 'string'],
            'shipping_state'            => [$shipRule, 'string'],
            'shipping_city'             => ['nullable', 'string'],
            'shipping_address'          => [$shipRule, 'string'],
            'shipping_postcode'         => ['nullable', 'string'],
            'shipping_phone'            => [$shipRule, 'string'],
            'shipping_email'            => [$shipRule, 'email'],
            'order_notes'               => ['nullable', 'string'],
        ];

        if ($this->payment_method == 'stripe') {
            $checkOutData['stripe_card_num'] = ['required', 'integer'];
            $checkOutData['stripe_exp_mon'] = ['required', 'integer', 'min:1'];
            $checkOutData['stripe_exp_year'] = ['required', 'integer', 'min:2'];
            $checkOutData['stripe_cvc'] = ['required', 'string', 'min:3'];
        }

        return $checkOutData;
    }
}
