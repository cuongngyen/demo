<?php
namespace App\Services\users\account;

use App\Repositories\user\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File; 

class AccountServices 
{
    protected $userRepository;
    
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    public function storeAccount(array $attributes, $id, $imageOld) 
    {
        if (!empty($attributes['avatar'])) {
            $nameImage = $this->uploadFile($attributes, $imageOld, $id);
            $attributes['avatar'] = $nameImage;
        }
        if (!empty($attributes['password'])) {
            $attributes['password'] = Hash::make($attributes['password']);
        } else {
            unset($attributes['password']);
        }
        if (empty($attributes['phone'])) {
            unset($attributes['phone']);
        }
        if ($id && $attributes) {
            return $this->userRepository->posteditUser($id, $attributes);
        }
        return false;
    }

    public function uploadFile($attributes, $imageOld="", $id)
    {
        if ($attributes) {
            $nameImage = str() . uniqid() . '.' . $attributes['avatar']->getClientOriginalExtension();
            $attributes['avatar']->move(base_path('public/upload/user'), $nameImage);
        } 
        if ($imageOld) {
            $checkPath = File::exists(public_path('upload/user/'. $imageOld));
            if ($checkPath) {
                File::delete(public_path('upload/user/'. $imageOld));
            }
            return $nameImage;
        }
        return $nameImage;
    }
}