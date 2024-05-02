<?php

namespace App\Http\Controllers\users;
use App\Http\Requests\users\users\AccountRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\users\account\AccountServices;
use Illuminate\Support\Facades\Auth;


class AccountController extends Controller
{
    public $accountServices;

    public function __construct(AccountServices $accountServices)
    {
        $this->accountServices = $accountServices;
    }

    public function account()
    {
        return view('users/account/account');
    }

    public function storeAccount(AccountRequest $request)
    {
        $id = Auth::user()->id;
        $imageOld = Auth::user()->avatar;
        $data = $this->accountServices->storeAccount($request->except('_token'), $id, $imageOld);
        if ($data) {
            return redirect()->route('account')->with('msgSuccess', 'Edit user success');
        }
        return redirect()->route('account')->with('msgError', 'Edit user fail');
    }
}
