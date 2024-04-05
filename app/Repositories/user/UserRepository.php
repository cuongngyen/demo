<?php
namespace App\Repositories\user;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository 
{
    public function listUser() 
    {
        return User::where('level', config('constant.user.user'))->get();
    }
    
    public function postaddUser(array $attributes) 
    {
        return User::create($attributes);    
    }
    
    public function editUser(int $id) {
        return User::find($id);    
    }

    public function posteditUser($id, array $attributes) 
    {
        $user = User::find($id);
        if ($user) {
            return $user->update($attributes);
        }
        return false;
    }

    public function deleteUser(int $id) 
    {
        $user = User::find($id);
        if ($user) {
            return $user->delete();
        } 
        return false;
    }
}