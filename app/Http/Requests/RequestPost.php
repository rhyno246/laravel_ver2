<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPost extends FormRequest
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
            'name' => 'bail|required|max:255'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Tiêu đề vài viết không được phép để trống",
            'name.max' => "Tiêu đề vài viết không được phép quá 255 ký tự",
        ];
    }
}
