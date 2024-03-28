<?php

namespace App\Http\Requests\admin\category;

use Illuminate\Foundation\Http\FormRequest;

class EditcategoryRequest extends FormRequest
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
            'name' => 'required|min:5|max:100|unique:category,name,' . request()->id,
        ];
    }
    public function messages() : array
    {
        return [
            'unique'=>':attribute đã tồn tại',
            'required'=>':attribute Vui lòng điền ',
            'min'=>':attributes phải lớn hơn :min',
            'max'=>':attributes phải nhỏ hơn :max',
        ];
    }
}
