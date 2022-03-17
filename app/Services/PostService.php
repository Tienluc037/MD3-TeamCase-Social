<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;

class PostService extends BaseService
{
    public $postRepository;
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getAll()
    {
        return $this->postRepository->getAll();
}
    public function store($request)
    {
        $post = new Post();
        $post->content = $request->input('content');
        $post->status_id = $request->status ?? 1;
        $post->user_id = Auth::user()->id;
        $post->save();
    }


    public function update($id,$request)
    {
        $post =$this->postRepository->getById($id);
        $post->content = $request->input('content');
        $post->status_id = $request->status;
        $post->user_id = $request->user;
        $post->save();

    }

    public function getById($id)
    {
        return $this->postRepository->getById($id);
    }

    public function deleteById($id)
    {
        return $this->postRepository->deleteById($id);
    }
}
