<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\admin\UsersRequest;
use App\Http\Requests\admin\UserEditRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Services\UserServices;
use Illuminate\Console\View\Components\Alert;

class UserController extends Controller
{
    public $userService;

    public function __construct(UserServices $userService)
    {
        $this->userService = $userService;
    }
    // dùng phải hiểu rõ mục đích của repo và service nó dùng làm gì.
    // Như ở đây nó return rồi mà m xử lí bên kia return sao đc /
    public function getUser ()
    {
        $user = $this->userService->getUser();
        if ($user) {
            return view('admin.user.list', compact('user'));
        } 
        return redirect()->route('listUser')->with('msgError', 'no account');
        
    }

    public function getAdd ()
    {
        return view('admin.user.add');
    }

    public function postAdd (UsersRequest $request)
    {
        $data = $this->userService->postAdd($request->except('_token', 'password_confirm'));
        if ($data) {
            return redirect()->route('listUser')->with('msgSuccess', 'Register user success'); 
        }

        return redirect()->route('listUser')->with('msgError', 'Register user fail');
        
    }

    public function getEdit ($id)
    {
        $user = $this->userService->getEdit($id);
        if ($user) {
            return view('admin.user.edit', compact('user'));
        }

        return redirect()->route('listUser')->with('msgError', 'User does not exist
            ');
        
    }
    public function postEdit (UserEditRequest $request, $id)
    {
        $data = $this->userService->postEdit($id, $request->except('_token'));
        if ($data) {
            return redirect()->route('listUser')->with('msgSuccess', 'Update user success');
        }

        return redirect()->route('listUser')->with('msgError', 'Update user fail');
        
    }

    public function getDelete ($id )
    {
        $data = $this->userService->getDelete($id);
        if ($data) {
            return redirect()->route('listUser')->with('msgSuccess', 'Delete user success');
        }

        return redirect()->route('listUser')->with('msgError', 'Delete user fail');
        
    }
}