<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
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
        $user = User::where('id',$id)->first();
        // nếu email không thay đổi và pass giữ nguyên thì validate name
        if( $user->email == request()->email && empty($password) ){
            return [
                'name'=>'required|min:8|max:100',
            ]; 
        // nếu email và pass thay đổi thì validate name, email , pass 
        }elseif($user->email != request()->email && !empty($password)){
            return [
                'name'=>'required|min:8|max:100',
                'email'=>'required|min:10|unique:Users,email|email',
                'password'=>'required|min:6|max:50',	
            ];
        // nếu email không thay đổi và pass thay đổi thì validate name và pass
        }elseif($user->email == request()->email && !empty($password)){
            return [
                'name'=>'required|min:8|max:100',
                'password'=>'required|min:6|max:50',	
            ];
        // nếu email thay dôi và pass không đổi thì validate name email
        }else{
            return [
                'name'=>'required|min:8|max:100',
                'email'=>'required|min:10|unique:Users,email|email',
            ];
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