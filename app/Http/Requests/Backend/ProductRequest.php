<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
        $stock_qty_rule = 'nullable';
        if ($this->filled('manage_stock')) {
            $stock_qty_rule = 'required';
        }
        return [
            'category'          => ['required', 'integer'],
            'brand'             => ['required', 'integer'],
            'title'             => ['required', 'string'],
            'description'       => ['nullable', 'string'],
            'short_description' => ['nullable', 'string'],
            'image'             => ['nullable', 'image', 'mimes:png,jpg'],
            'regular_price'     => ['nullable', 'integer'],
            'sale_price'        => ['nullable', 'integer'],
            'sale_start'        => ['nullable'],
            'sale_end'          => ['nullable'],
            'sku'               => ['nullable', 'string'],
            'status'            => ['nullable', 'string', 'max:15'],
            'hot_deals'         => ['nullable', 'string', 'max:15'],
            'is_featured'       => ['nullable', 'string', 'max:15'],
            'special_deals'     => ['nullable', 'string', 'max:15'],
            'special_offers'    => ['nullable', 'string', 'max:15'],
            'manage_stock'      => ['nullable', 'string', 'max:15'],
            'stock_status'      => ['nullable', 'string'],
            'stock_qty'         => [$stock_qty_rule, 'integer'],
            'image_gallery'     => ['nullable'],
            'image_gallery.*'   => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
        ];
    }
}
