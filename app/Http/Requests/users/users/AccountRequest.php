<?php

namespace App\Http\Requests\users\users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AccountRequest extends FormRequest
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
            'email'=> 'required|min:10|email|unique:users,email,' . Auth::user()->id ,	
            'password'=>'nullable|min:6|max:50',	
            'phone'=>'nullable|numeric',
        ];	
    }	
    public function messages () : array	
    {	
        return [	
            'unique'=>':attribute đã tồn tại',	
            'required'=>':attribute Vui lòng điền ',	
            'min'=>':attributes phải lớn hơn :min',	
            'max'=>':attributes phải nhỏ hơn :max',	
            'numeric'=>':attribute không đúng định dang số',
        ];	
    }	
}
