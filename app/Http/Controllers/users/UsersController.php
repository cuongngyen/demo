<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\admin\user\UsersRequest;
use App\Http\Requests\users\users\LoginRequest;
use App\Services\users\users\UsersServices;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    public $usersServices;

    public function __construct(UsersServices $usersServices)
    {
        $this->usersServices = $usersServices;
    }

    public function login()
    {
        return view('users/login/login');
    }

    public function storeLogin(LoginRequest $request)
    {
        $data = $this->usersServices->storeLogin($request->except('_token'));
        if ($data) {
            return redirect()->route('index');
        } else {
            return redirect()->back()->with('msgError', 'Email or password is incorrect');
        }
    }

    public function register()
    {
        return view('users/register/register');
    }

    public function storeRegister(UsersRequest $request)
    {
        $data = $this->usersServices->storeRegister($request->except('_token','password_confirm'));
        if ($data) {
            return redirect()->route('loginuser')->with('msgSuccess', 'Register user success'); 
        }
        return redirect()->back()->with('msgError', 'Register user fail');
    }

    public function logout()
    {
        $data = $this->usersServices->logout();
        if ($data) {
            return redirect()->route('loginUser')->with('msgSuccess', 'Logout user success'); 
        }
        return redirect()->back()->with('msgError', 'Logout user fail');
    }
}
