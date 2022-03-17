<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\impl\BaseInterface;


class PostRepository extends BaseRepository implements BaseInterface
{
    public $table = "posts";

    public function getModel()
    {
        return Post::class;
    }

//    public function getAll()
//    {
//        return $this->model::orderBy('created_at','desc')->get();
//    }
}
