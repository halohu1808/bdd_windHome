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

    public function store($request, $roomId)    //Test lại phần userId và roomId
    {
        $userId = Auth::user()->id;
        $comment = $request->comment;

        $data = [
            "comment" => $comment,
            "userId" => $userId,
            "roomId" => $roomId,
        ];
        $this->commentRepositoy->store($data);
    }

    public function update($request, $id)
    {
        $comment = $this->commentRepositoy->findById($id);
        $data = $request->all();
        $this->commentRepositoy->update($comment, $data);
    }

    public function destroy($id)
    {
        $comment = $this->commentRepositoy->findById($id);
        $this->commentRepositoy->destroy($comment);
    }
}
