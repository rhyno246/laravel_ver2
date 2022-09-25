<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProducts extends FormRequest
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
            'name' => 'bail|required|max:255',
            'price' => 'numeric|min:0',
            'stock' => 'numeric|min:0',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Tên không được phép để trống",
            'name.max' => "Tên không được phép quá 255 ký tự",
            'price.min' => "Giá không được nhỏ hơn 0",
            'stock.min' => "Số lượng không được nhỏ hơn 0"
        ];
    }
}