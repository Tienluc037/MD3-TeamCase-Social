<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Auth;

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

}
