<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_category_id' => 'required',
            'brand_id' => 'required',
            'price' => 'required|min:4',
            'qty' => 'required',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.min' => 'Tên tối thiểu 3 kí tự',
            'name.max' => 'Tên tối đa 50 kí tự',
            'product_category_id.required' => 'Tên danh mục không được để trống',
            'brand_id.required' => 'Tên thương hiệu không được để trống',
            'price.required' => 'Giá tiền không được để trống',
            'price.min' => 'Giá tiền quá thấp ',
            'qty.required' => 'Số lượng không được để trống',
            'status.required' => 'Trạng thái không được bỏ trống'
        ];
    }
}
