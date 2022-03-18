<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\PostRepository;
use App\Services\PostService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    protected $postService;
    public function __construct(UserService $userService, PostService $postService)
    {
        $this->userService = $userService;
        $this->postService = $postService;
    }

    public function index()
    {
        $users = $this->userService->getAll();
        return view('backend.user.list',compact('users'));
    }

    public function show($id)
    {
        $user = $this->userService->getById($id);
        $posts = $this->postService->getAll();
        return view('backend.user.detail',compact('user','posts'));
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
