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

    public function getUser() 
    {
        return $this->userRepository->getUser();
    }

    public function postAdd(array $attributes) 
    {
        $attributes['level'] = config('constant.user.user');
        $attributes['password'] = Hash::make($attributes['password']);
        if ($attributes) {
            return $this->userRepository->postAdd($attributes); 
        }
        return false;
    }

    public function getEdit(int $id) 
    {
        if($id){
            return $this->userRepository->getEdit($id);    
        }
        return false;
    }

    public function postEdit($id, array $attributes) 
    {
        if (!empty($attributes['password'])) {
            $attributes['password'] = Hash::make($attributes['password']);
        } else {
            unset($attributes['password']);
        }
        if ($id && $attributes) {
            return $this->userRepository->postEdit($id, $attributes);
        }
        return false;
    }

    public function getDelete($id) 
    {
        return $this->userRepository->getDelete($id);
    }
}