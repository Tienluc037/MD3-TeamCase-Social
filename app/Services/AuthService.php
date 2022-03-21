<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService extends BaseService
{
    public $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login($request)
    {
        $data = $request->only('email','password');
        if(Auth::attempt($data)){
            return true;
        }
        else{
            return false;
        }
    }

    public function logout()
    {
        Auth::logout();
    }

    public function create($request)
    {
        $users = $request->only('name','email','address','password');
        $users['password'] = Hash::make($users['password']);
        $users['role_id'] = 2;
        $user = User::create($users);
        return $this->sendResponse($user,'Create Successful',201);
    }
}
