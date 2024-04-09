<?php

namespace App\Http\Requests\admin\product;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|min:2|max:50',
            'image'=> 'required|mimes:jpg,jpeg,png',
            'quantity'=>'required|numeric',	
            'price'=>'required|numeric',	
            'description'=>'required|min:10',	
        ];
    }

    public function messages () : array
    {
        return [
            'required'=>':attribute Vui lòng điền ',
            'min'=>':attributes phải lớn hơn :min',
            'max'=>':attributes phải nhỏ hơn :max',
            'mimes'=>':attribute không đúng định dạng',
            'numeric'=>':attribute không đúng định dang số',
        ];
    }
}
