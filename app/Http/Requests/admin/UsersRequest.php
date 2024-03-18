<?php	

namespace App\Http\Requests\admin;	

use Illuminate\Foundation\Http\FormRequest;	

class UsersRequest extends FormRequest	
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
            'email'=>'required|min:10|unique:users,email|email',	
            'password'=>'required|min:6|max:50',	
            'password_confirm'=>'required|same:password',	
        ];	
    }	
    public function messages () : array	
    {	
        return [	
            'unique'=>':attribute đã tồn tại',	
            'required'=>':attribute Vui lòng điền ',	
            'min'=>':attributes phải lớn hơn :min',	
            'max'=>':attributes phải nhỏ hơn :max',	
            'same'=>':attribute không trùng nhau',	
        ];	
    }	
}	
