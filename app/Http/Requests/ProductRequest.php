<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',

            'en_name' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug,'.$this->product,

            'en_desc' => 'nullable|string',
            'en_shipping' => 'nullable|string',
            'en_additionalinfo' => 'nullable|string',

            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'quantity' => 'required|integer|min:0',

            'is_featured' => 'nullable|boolean',
            'is_best_selling' => 'nullable|boolean',
            'is_new_arrival' => 'nullable|boolean',
            'is_onsale' => 'nullable|boolean',

            'status' => 'nullable|boolean',
        ];
    }
}
