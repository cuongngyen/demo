<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
class UserEditRequest extends FormRequest
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
            'name'=>'required|min:8|max:100',
            'email'=> 'required|min:10|email|unique:users,email,' . request()->id,
            'password'=>'nullable|min:6|max:50',	
        ];
    }
    
    public function messages () : array
    {
        return [
            'email' => ':attribute không hợp lệ',
            'unique'=>':attribute đã tồn tại',
            'required'=>':attribute Vui lòng điền ',
            'min'=>':attributes phải lớn hơn :min',
            'max'=>':attributes phải nhỏ hơn :max',
        ];
    }
}