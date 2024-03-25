<?php
namespace App\Repositories\user;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository 
{
    public function getUser() {
        return User::where('level', config('constant.user.user'))->get();
    }
    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function postAdd(array $attributes) {

        return User::create($attributes);    
        
    }
    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function getEdit(int $id) {

        return User::find($id);    
        
    }

    public function postEdit($id, array $attributes) {
        $user = User::find($id);
        if ($user) {
            return User::where('id', $id)->update($attributes);
        }
        return false;
    }

    public function getDelete(int $id) {
        $user = User::find($id);
        if ($user) {
            return $user->delete();
        } 
        return false;
    }
}