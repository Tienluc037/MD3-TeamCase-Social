<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Repositories\CommentRepository;
use App\Services\CommentService;
use Illuminate\Http\Request;
use function Symfony\Component\Translation\t;

class CommentController extends Controller
{
    public $commentService;
    public $commentRepository;

    public function __construct(CommentRepository $commentRepository, CommentService $commentService)
    {
        $this->commentService =$commentService;
        $this->commentRepository = $commentRepository;
    }

    public function index()
    {
        $comments = $this->commentService->getAll();
        return view('welcome', compact($comments));
    }

    public function store($id,Request $request)
    {
        $post = Post::findOrFail($id);
//        dd($post);
        $this->commentService->store($request,$id);
        return redirect()->route('posts.index',compact('post'));
    }





    public function destroy($id)
    {
        $this->commentService->deleteById($id);
        return redirect()->route('posts.index');
    }
}
