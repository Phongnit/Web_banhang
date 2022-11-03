<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'name' => 'required|min:3|max:50',
            'status' => 'required'
        ];
    }
    public function messages() {
        return [
            'name.required' => 'Tên thương hiệu không được để trống',
            'name.min' => 'Tên tối thiểu 3 kí tự',
            'name.max' => 'Tên tối đa 50 kí tự',
            'status.required' => 'Trạng thái không được bỏ trống'
        ];
    }
}
