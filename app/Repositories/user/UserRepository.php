<?php
namespace App\Repositories\user;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository 
{
    public function getUser() 
    {
        return User::where('level', config('constant.user.user'))->get();
    }
    
    public function postAdd(array $attributes) 
    {
        return User::create($attributes);    
    }
    
    public function getEdit(int $id) {
        return User::find($id);    
    }

    public function postEdit($id, array $attributes) 
    {
        $user = User::find($id);
        if ($user) {
            return $user->update($attributes);
        }
        return false;
    }

    public function getDelete(int $id) 
    {
        $user = User::find($id);
        if ($user) {
            return $user->delete();
        } 
        return false;
    }
}