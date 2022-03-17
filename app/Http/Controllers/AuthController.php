<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestForm;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function showFormRegister()
    {
        return view('backend.auth.register');
    }


    public function login(RequestForm $request)
    {
        if($this->authService->login($request)){
            toastr()->success('Welcome '. Auth::user()->name);
            return redirect()->route('posts.index');
        }
        else{
            Session::flash('msg','Tài khoản hoặc mật khẩu sai');
            return redirect()->back();
        }
    }

    public function logout()
    {
        $this->authService->logout();
        return view('showFormLogin');

    }

    public function register(Request $request)
    {
        $this->authService->create($request);
        toastr()->success('Đăng ký thành công');
        return redirect()->route('login');
    }
}
