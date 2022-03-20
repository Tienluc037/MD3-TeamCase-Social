<?php

namespace App\Repositories;

use App\Models\Comment;
use App\Repositories\impl\BaseInterface;

class CommentRepository extends BaseRepository implements BaseInterface
{
    public $table = "comments";
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Comment::class;
    }
    public function getAll()
    {
        return $this->model::orderBy('created_at','desc')->get();
    }


}
