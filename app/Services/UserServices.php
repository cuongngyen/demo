<?php
namespace App\Services;

use App\Repositories\user\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserServices 
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function listUser() 
    {
        return $this->userRepository->listUser();
    }

    public function postaddUser(array $attributes) 
    {
        $attributes['level'] = config('constant.user.user');
        $attributes['password'] = Hash::make($attributes['password']);
        if ($attributes) {
            return $this->userRepository->postaddUser($attributes); 
        }
        return false;
    }

    public function editUser(int $id) 
    {
        if($id){
            return $this->userRepository->editUser($id);    
        }
        return false;
    }

    public function posteditUser($id, array $attributes) 
    {
        if (!empty($attributes['password'])) {
            $attributes['password'] = Hash::make($attributes['password']);
        } else {
            unset($attributes['password']);
        }
        if ($id && $attributes) {
            return $this->userRepository->posteditUser($id, $attributes);
        }
        return false;
    }

    public function deleteUser($id) 
    {
        return $this->userRepository->deleteUser($id);
    }
}