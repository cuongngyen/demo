<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\admin\UsersRequest;
use App\Http\Requests\admin\UsereditRequest;
use App\Models\user;
class UserController extends Controller
{

    public function getUser()
    {
        $user = user::where('level', config('constant.user.user'))->get();
        return view('admin.user.user',compact('user'));
    }

    public function getAdd()
    {
        return view('admin.user.add');
    }
    public function postAdd(UsersRequest $request)
    {
        $user = user::create(['name' => $request->name,
                            'email'=> $request->email,
                            'password'=> bcrypt($request->password),
                            'password_confirm' =>bcrypt($request->password_confirm),
                            'level' => config('constant.user.user'),
                            ]);
        return back()->with('thongbao_add', 'Bạn đã đăng kí thành công');
    }

    public function getEdit($id)
    {
        $user = user::find($id);
        return view('admin.user.edit', compact('user'));
    }
    public function postEdit(UsereditRequest $request, $id)
    {
        if(isset($request->password)){
            user::find($id)->update([
                'name'=> $request->name,
                'email'=> $request->email,
                'password' => bcrypt($request->password),
                'password_confirm' => bcrypt($request->password),
            ]);
        }else{
            user::find($id)->update([
                'name'=> $request->name,
                'email'=> $request->email,
                'password' => bcrypt($request->password_temp),
                'password_confirm' => bcrypt($request->password_temp),
            ]);
        }
        return back()->with('thongbao_edit', 'Bạn Update thành công');
    }
    public function Delete(request $request ,string $id)
    {
        user::where('id',$id)->delete();
        return back()->with('thongbao_delete', 'Bạn delete thành công');
    }
}