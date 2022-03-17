<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;

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
        $post->image = $request->input('image');
        $post->status_id = $request->status;
        $post->user_id = $request->user;
        if($request->hasFile('image')) {
            $path = $request->file('image')->store('images','public');
            $post->image = $path;
        }
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
