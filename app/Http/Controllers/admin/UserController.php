<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\admin\UsersRequest;
use App\Http\Requests\admin\UsereditRequest;
use App\Models\User;
class UserController extends Controller
{

    public function getUser()
    {
        $user = User::where('level', config('constant.user.user'))->get();
        return view('admin.user.user',compact('user'));
    }

    public function getAdd()
    {
        return view('admin.user.add');
    }
    public function postAdd(UsersRequest $request)
    {
        $user = User::create(['name' => $request->name,
                            'email'=> $request->email,
                            'password'=> bcrypt($request->password),
                            'password_confirm' =>bcrypt($request->password_confirm),
                            'level' => config('constant.user.user'),
                            ]);
        return redirect()->route('listUser')->with('notification_add', 'Bạn đã đăng kí thành công');
    }

    public function getEdit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }
    public function postEdit(UsereditRequest $request, $id)
    {
        // if password có giá trị mới thì lấy $request của password mới update vào bảng ,
        // else password không thay đổi giá trị thì lấy giá trị cũ lưu vào ,
        // value của input password để trống nên 
        // ta có tạo 1 cái input hidden có name là password_temp bên view và có value mang giá trị cũ
        if(isset($request->password)){
            User::where('id',$id)
                ->update([
                    'name'=> $request->name,
                    'email'=> $request->email,
                    'password' => bcrypt($request->password),
                    'password_confirm' => bcrypt($request->password),
                ]);
        }else{
            User::where('id',$id)
                ->update([
                    'name'=> $request->name,
                    'email'=> $request->email,
                ]);
        }
        return redirect()->route('listUser')->with('notification_edit', 'Bạn Update thành công');
    }
    public function Delete(request $request ,string $id)
    {
        User::where('id',$id)->delete();
        return redirect()->route('listUser')->with('notification_delete', 'Bạn delete thành công');
    }
}