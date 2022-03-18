<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Repositories\CommentRepository;

use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;

class CommentService extends BaseService
{
    public $commentService;
    public $postService;

    public function __construct(CommentRepository $commentRepository,
    PostRepository $postRepository)
    {
      $this->commentService = $commentRepository;
      $this->postService = $postRepository;
    }

    public function getAll()
    {
        return $this->commentService->getAll();
    }

    public function store($request,$id)
    {
//        dd($request);
        $comment = new Comment();
        $comment->content = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $id;
        $comment->save();
    }

    public function deleteById($id)
    {
        return $this->postService->deleteById($id);
    }

    public function getById($id)
    {
        return $this->postService->getById($id);
    }

    public function update($request,$id)
    {
        $comments = $this->commentService->getById($id);
        $comments->content = $request->content;
        $comments->user_id = Auth::user()->id;
        $comments->post_id = $this->postService->getById($id);
        $comments->save();
    }

}
