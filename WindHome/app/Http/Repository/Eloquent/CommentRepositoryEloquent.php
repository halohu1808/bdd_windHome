<?php


namespace App\Http\Repository\Eloquent;


use App\Comment;
use App\Http\Repository\Contract\CommentRepositoryInterface;

class CommentRepositoryEloquent extends RepositoryEloquent implements CommentRepositoryInterface
{

    public function getModel()
    {
        return Comment::class;
    }

//    public function store($comment)
//    {
//        $comment->save();
//    }

}
