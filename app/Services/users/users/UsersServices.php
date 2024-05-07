<?php
namespace App\Services\users\users;

use App\Repositories\user\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UsersServices 
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    public function storeLogin(array $attributes) 
    {
        $login = [
            'email' => $attributes['email'],
            'password' => $attributes['password'],
            'level' => config('constant.user.user')
        ];
        if (Auth::attempt($login)) {
            return true;
        } 
        return false;
    }


    public function storeRegister(array $attributes) 
    {
        $attributes['level'] = config('constant.user.user');
        $attributes['password'] = Hash::make($attributes['password']);
        if ($attributes) {
            return $this->userRepository->postaddUser($attributes); 
        }
        return false;
    }

    public function logout()
    {
        Auth::logout();
        return true;
    }
}