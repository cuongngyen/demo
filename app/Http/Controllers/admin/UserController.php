<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\admin\user\UsersRequest;
use App\Http\Requests\admin\user\UserEditRequest;
use App\Http\Requests\admin\logon\LogonRequest;
use App\Services\admin\user\UserServices;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public $userService;

    public function __construct(UserServices $userService)
    {
        // $this->middleware('auth');
        $this->userService = $userService;
    }
    // dùng phải hiểu rõ mục đích của repo và service nó dùng làm gì.
    // Như ở đây nó return rồi mà m xử lí bên kia return sao đc /
    public function listUser ()
    {
        $user = $this->userService->listUser();
        if ($user) {
            return view('admin.user.list', compact('user'));
        } 
        return redirect()->route('listUser')->with('msgError', 'no account');
    }

    public function addUser ()
    {
        return view('admin.user.add');
    }

    public function postaddUser (UsersRequest $request)
    {
        $data = $this->userService->postaddUser($request->except('_token', 'password_confirm'));
        if ($data) {
            return redirect()->route('listUser')->with('msgSuccess', 'Register user success'); 
        }
        return redirect()->route('listUser')->with('msgError', 'Register user fail');
    }

    public function editUser ($id)
    {
        $user = $this->userService->editUser($id);
        if ($user) {
            return view('admin.user.edit', compact('user'));
        }
        return redirect()->route('listUser')->with('msgError', 'User does not exist');
    }

    public function posteditUser (UserEditRequest $request, $id)
    {
        $data = $this->userService->posteditUser($id, $request->except('_token'));
        if ($data) {
            return redirect()->route('listUser')->with('msgSuccess', 'Update user success');
        }
        return redirect()->route('listUser')->with('msgError', 'Update user fail');
    }

    public function deleteUser ($id)
    {
        $data = $this->userService->deleteUser($id);
        if ($data) {
            return redirect()->route('listUser')->with('msgSuccess', 'Delete user success');
        }
        return redirect()->route('listUser')->with('msgError', 'Delete user fail');
    }

    public function logon ()
    {
        return view('admin/logon/logon');
    }
    
    public function storeLogon (LogonRequest $request)
    {
        $data = $this->userService->storeLogon($request->except('_token'));
        if ($data) {
            return redirect()->route('listUser');
        } else {
            return redirect()->back()->with('msgError', 'Email or password is incorrect');
        }
    }

    public function logout ()
    {
        $data = $this->userService->logout();
        if ($data) {
            return redirect()->route('logonAdmin')->with('msgSuccess', 'Logout admin success'); 
        }
        return redirect()->back()->with('msgError', 'Logout admin fail');
    }
}