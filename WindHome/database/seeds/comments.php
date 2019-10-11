<?php

use App\Comment;
use Illuminate\Database\Seeder;

class comments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = new Comment();
        $comment->id = 1;
        $comment->comment = 'Ngôi nhà sạch sẽ thoáng mát quá tuyệt vời';
        $comment->userId = 1;
        $comment->roomId = 1;
        $comment->save();

        $comment = new Comment();
        $comment->id = 2;
        $comment->comment = 'Sach se thoang mat';
        $comment->userId = 2;
        $comment->roomId = 1;
        $comment->save();

        $comment = new Comment();
        $comment->id = 3;
        $comment->comment = 'nam sao cho chat luong';
        $comment->userId = 3;
        $comment->roomId = 1;
        $comment->save();
    }
}

