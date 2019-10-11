<?php


namespace App\Http\Service\Impl;

use App\Comment;
use App\Http\Repository\Eloquent\CommentRepositoryEloquent;
use App\Http\Service\ServiceInterface\CommentServiceInterface;

class CommentService implements CommentServiceInterface
{
    protected $commentRepositoy;

    public function __construct(CommentRepositoryEloquent $commentRepositoy)
    {
        $this->commentRepositoy = $commentRepositoy;
    }

    public function getAll()
    {
        return $this->commentRepositoy->getAll();
    }

    public function store($request, $userId, $roomId)
    {
        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->userId = $userId;
        $comment->roomId = $roomId;
        $this->commentRepositoy->store($comment);
    }
}
