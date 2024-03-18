<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\admin\user;
class UsereditRequest extends FormRequest
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
        $id = request()->id;
        $password = request()->password;
        $user = user::where('id',$id)->first();
        if($user->email == request()->email){
            // kiểm tra nếu password = null thì không bắt lỗi 
            if(!isset($password)){
                return [
                    'name'=>'required|min:8|max:100',
                ]; 
            }else{
                return [
                    'name'=>'required|min:8|max:100',
                    'password'=>'required|min:6|max:50',
                ]; 
            }

        }else{
            if(!isset($password)){
                return [
                    'name'=>'required|min:8|max:100',
                    'email'=>'required|min:10|unique:users,email|email',
                ];
            }else{
                return [
                    'name'=>'required|min:8|max:100',
                    'email'=>'required|min:10|unique:users,email|email',
                    'password'=>'required|min:6|max:50',
                ];
            }

        }

    }
    public function messages () : array
    {
        return [
            'unique'=>':attribute đã tồn tại',
            'required'=>':attribute Vui lòng điền ',
            'min'=>':attributes phải lớn hơn :min',
            'max'=>':attributes phải nhỏ hơn :max',
        ];
    }
}