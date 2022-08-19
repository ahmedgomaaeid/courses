<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'price' => 'required',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'هذا الحقل مطلوب',
            'image.required' => 'هذا الحقل مطلوب',
            'image.image' => 'هذا الحقل يجب ان يكون صورة',
            'image.mimes' => 'هذة الصيغة غير صحيحة',
            'price.required' => 'هذا الحقل مطلوب',
            'category_id.required' => 'هذا الحقل مطلوب',
        ];
    }
}
