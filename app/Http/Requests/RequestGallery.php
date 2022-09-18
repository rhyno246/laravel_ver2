<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestGallery extends FormRequest
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
            'feature_image_path' => 'required|image|mimes:jpeg,png|mimetypes:image/jpeg,image/png'
        ];
    }
    public function messages()
    {
        return [
            'feature_image_path.required' => "Bạn chưa chọn hình",
            'feature_image_path.mimes' => "Bạn phải chọn định dạng hình ảnh là jpeg,png",
            'feature_image_path.image' => "Bạn phải chọn định dạng hình ảnh là jpeg,png"
        ];
    }
}
