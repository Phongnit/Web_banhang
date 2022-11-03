<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'=> 'required|min:3|max:100',
            'status'=> 'required',
            'brand_id'=> 'required',
            'product_category_id'=> 'required',
            'description'=> 'required',
            'price'=> 'required',
            'discount'=>' required',
            'size_id' =>'required',
            'color_id' => 'required',
            'qty'=> 'required|min:1|max:10000'
        ];
    }
    //Todo thêm messages validate
    public function messages()
    {
        return [
          'name.required' => 'Tên sản phẩm không được bỏ trống',
            'name.min' => 'Tên sản phẩm có ít nhất 3 kí tự',
            'name.max' => 'Tên sản phẩm tối đa 100 kí tự',
            'status.required' => 'Trạng thái không được để trống',
            'brand_id.required' => 'Tên thương hiệu không được để trống',
            'size_id.required'=>'Size không được để trống',
            'color_id.required'=>'Màu sắc không được để trống',
            'product_category_id.required' => 'Tên danh mục không được để trống',
            'description.required' => 'Tên thương hiệu không được để trống',
            'price.required' => 'Giá không được để trống',
            'discount.required' => 'Giảm giá không được để trống',
            'qty.required'=>'Số lượng không được để trống'
        ];
    }
}
