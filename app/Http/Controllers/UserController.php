<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAll();
        return view('backend.user.list',compact('users'));
    }


    public function edit($id)
    {
        $user = $this->userService->getById($id);
        return view('backend.user.update',compact('user'));
    }


    public function update($id, Request $request)
    {
        $this->userService->update($id,$request);
        toastr()->success('Cập nhật thông tin thành công');
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $this->userService->deleteById($id);
        return redirect()->route('users.index');
    }
}
