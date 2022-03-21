<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\PostRepository;
use App\Services\PostService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        return view('backend.user.list', compact('users'));
    }

    public function show($id)
    {
        $user = $this->userService->getById($id);
        $posts = $this->postService->getAll();
        return view('backend.user.detail', compact('user', 'posts'));
    }

    public function edit($id)
    {
        $user = $this->userService->getById($id);
        return view('backend.user.update', compact('user'));
    }


    public function update($id, Request $request)
    {
        $this->userService->update($id, $request);
        toastr()->success('Cập nhật thông tin thành công');
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $this->userService->deleteById($id);
        return redirect()->route('users.index');
    }

    public function addFriend($id)
    {
        $from = Auth::user()->id;
        $to = $id;
        DB::table('relations')->insert(['from' => $from, 'to' => $to, 'status_id' => 1]);
        return redirect()->route('users.show', $id);
    }

    public function cancelRequest($id)
    {
        $from = Auth::user()->id;
        $to = $id;
        DB::table('relations')->where(['from' => $from, 'to' => $to, 'status_id' => 1])->delete();
        return redirect()->route('users.show', $id);
    }

    public function acceptRequest($id)
    {
        $to = Auth::user()->id;
        $from = $id;
        DB::table('relations')->where(['from' => $from, 'to' => $to, 'status_id' => 1])->update(['status_id' => 2]);
        return redirect()->route('users.show', $id);
    }

    public function denyRequest($id)
    {
        $to = Auth::user()->id;
        $from = $id;
        DB::table('relations')->where(['from' => $from, 'to' => $to, 'status_id' => 1])->delete();
        return redirect()->route('users.show', $id);
    }


}
