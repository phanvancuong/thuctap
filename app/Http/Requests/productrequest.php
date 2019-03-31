<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productrequest extends FormRequest
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
            'sltparent'=>'required',
            'txtName'=>'required|unique:products,name',
            'fImages'=>'required|image'
        ];
    }
    public function messages() {
        return [
            'sltparent.required'=>'chưa chọn tên sản phẩm...!!!',
            'txtName.required'=>'chưa có tên sản phẩm...!!!',
            'txtName.unique'=>'tên sản phẩm đã tồn tại...!!!',
            'fImages.required'=>'bạn chưa thêm hình sản phẩm...!!!',
            'fImages.image'=>'file này không phải là bức hình..!'
        ];
    }
}
