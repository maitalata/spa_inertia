<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'brand' => 'required|string|max:255',
            'weight' => 'required|numeric',
            'category_id' => 'required|integer|exists:categories,id',
            'description' => 'required|string',
        ];
    }

    public function attributes()
    {
        return [
            'category_id' => 'Category',
        ];
    }

    // public function prepareForValidation()
    // {
    //     $this->merge(
    //         [
    //             'price' => $this->price * 100,
    //         ]
    //     );
    // }

}
