<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public $authService;

    public function __construct(AuthService $authService)
    {
        return $this->authService = $authService;
    }

    public function showFormLogin()
    {
        return view('backend.auth.login');
    }

    public function login(Request $request)
    {
        if($this->authService->login($request)){
            return view('welcome');
        }
        else{
            Session::flash('msg','Tài khoản hoặc mật khẩu sai');
            return redirect()->back();
        }
    }

    public function logout()
    {
        $this->authService->logout();
        return view('welcome');

    }
}
