<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService extends BaseService
{
    public $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository=$userRepository;
    }

    public function getAll()
    {
        return $this->userRepository->getAll();
    }

    public function getById($id)
    {
        return $this->userRepository->getById($id);
    }


    public function update($id,$request)
    {
        $user = $this->userRepository->getById($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->save();
    }

    public function deleteById($id)
    {
        return $this->userRepository->deleteById($id);
    }
}
