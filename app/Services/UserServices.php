<?php
namespace App\Services;

use App\Repositories\user\UserRepository;

class UserServices 
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUser() {
        return $this->userRepository->getUser();
    }

    public function postAdd(array $attributes) {
        return $this->userRepository->postAdd($attributes);
    }

    public function getEdit(int $id) {
        return $this->userRepository->getEdit($id);
    }

    public function postEdit($id, array $attributes) {
        return $this->userRepository->postEdit($id, $attributes);
    }

    public function getDelete($id) {
        return $this->userRepository->getDelete($id);
    }
}