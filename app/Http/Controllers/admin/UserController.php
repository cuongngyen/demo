<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\user;
use App\Http\Requests\admin\UsersRequest;
use App\Http\Requests\admin\UsereditRequest;

class UserController extends Controller
{
    
    public function GetUser()
    {
        $user = user::where('level', config('constant.user.user'))->get();
        return view('admin/user/user',compact('user'));
    }

    public function GetAdd()
    {
        return view('admin/user/add');
    }
    public function PostAdd(UsersRequest $request)
    {
        $user = new user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->password_confirm = bcrypt($request->password_confirm);
        $user->level = 1;
        $user->save();
        return back()->with('thongbao_add', 'Bạn đã đăng kí thành công');
    }

    public function GetEdit($id)
    {
        $user = user::find($id);
        return view('admin/user/edit', compact('user'));
    }
    public function PostEdit(UsereditRequest $request, $id)
    {
        // lay
        $user = user::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if(isset($request->password)){
            $user->password = bcrypt($request->password);
            $user->password_confirm = bcrypt($request->password);
        }else{
            $user->password = bcrypt($request->password_temp);
            $user->password_confirm = bcrypt($request->password_temp);
            
        }
        
        
        $user->save();
        return back()->with('thongbao_edit', 'Bạn Update thành công');

    }
    public function delete(request $request ,string $id)
    {
        user::where('id',$id)->delete();
    }
}
