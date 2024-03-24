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
        $attributes['level'] = config('constant.user.user');
        $attributes['password'] = Hash::make($attributes['password']);
        if ($attributes) {
            return User::create($attributes);
        }
        return false;
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
        if (!empty($attributes['password'])) {
            $attributes['password'] = Hash::make($attributes['password']);
        } else {
            unset($attributes['password']);
        }
        $user = User::find($id);
        if ($user) {
            return User::where('id', $id)->update($attributes);
        }
        return false;
    }

    public function getDelete(int $id) {
        $data = User::find($id);
        if ($data) {
            return $data->delete();
        } 
        return false;
    }
}