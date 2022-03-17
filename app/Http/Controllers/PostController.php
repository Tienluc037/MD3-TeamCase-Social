<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Status;
use App\Models\User;
use App\Repositories\PostRepository;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
        protected $postService;
        protected $postRepository;

        public function __construct(PostService $postService, PostRepository $postRepository)
        {
            $this->postService = $postService;
            $this->postRepository = $postRepository;
        }

    public function index()
    {
        $posts = $this->postService->getAll();
        return view('welcome',compact('posts'));
//        return view('backend.post.list',compact('posts'));
    }

    public function create()
    {
        $status = Status::all();
        $users = User::all();
        return view('backend.post.create', compact('status','users'));
    }

    public function store(Request $request)
    {
        $this->postService->store($request);
        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        $post = $this->postService->getById($id);
        $status = Status::all();
        $users = User::all();
        return view('backend.post.update',compact('post','status','users'));
    }

    public function update($id, Request $request)
    {
        $this->postService->update($id,$request);
        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $this->postService->deleteById($id);
        return redirect()->route('posts.index');
    }
}
