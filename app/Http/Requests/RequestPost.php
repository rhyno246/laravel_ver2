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
            'name' => 'bail|required|max:255',
            'feature_image_path' => 'image|mimes:jpeg,png|mimetypes:image/jpeg,image/png'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Tên không được phép để trống",
            'name.max' => "Tên không được phép quá 255 ký tự",
            'feature_image_path.mimes' => "Bạn phải chọn định dạng hình ảnh là jpeg,png",
            'feature_image_path.image' => "Bạn phải chọn định dạng hình ảnh là jpeg,png"
        ];
    }
}
