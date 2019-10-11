<?php

use App\Image;
use Illuminate\Database\Seeder;

class images extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image = new Image();
        $image->id = 1;
        $image->roomId = 1;
        $image->images = 'public\images\nha1.jpg';
        $image->images = 'public\images\nha1phongan.jpg';
        $image->images = 'public\images\nha1phongkhach.jpg';
        $image->images = 'public\images\nha1phongngu1.jpg';
        $image->images = 'public\images\nha1phongngu2.jpg';
        $image->images = 'public\images\nha1phongngu3.jpg';
        $image->images = 'public\images\nha1phongngu4.jpg';
        $image->save();

        $image = new Image();
        $image->id = 2;
        $image->roomId = 2;
        $image->images = 'public\images\nha1.jpg';
        $image->images = 'public\images\nha1phongan.jpg';
        $image->images = 'public\images\nha1phongkhach.jpg';
        $image->images = 'public\images\nha1phongngu1.jpg';
        $image->images = 'public\images\nha1phongngu2.jpg';
        $image->images = 'public\images\nha1phongngu3.jpg';
        $image->images = 'public\images\nha1phongngu4.jpg';
        $image->save();

        $image = new Image();
        $image->id = 3;
        $image->roomId = 3;
        $image->images = 'public\images\nha1.jpg';
        $image->images = 'public\images\nha1phongan.jpg';
        $image->images = 'public\images\nha1phongkhach.jpg';
        $image->images = 'public\images\nha1phongngu1.jpg';
        $image->images = 'public\images\nha1phongngu2.jpg';
        $image->images = 'public\images\nha1phongngu3.jpg';
        $image->images = 'public\images\nha1phongngu4.jpg';
        $image->save();

        $image = new Image();
        $image->id = 4;
        $image->roomId = 4;
        $image->images = 'public\images\nha1.jpg';
        $image->images = 'public\images\nha1phongan.jpg';
        $image->images = 'public\images\nha1phongkhach.jpg';
        $image->images = 'public\images\nha1phongngu1.jpg';
        $image->images = 'public\images\nha1phongngu2.jpg';
        $image->images = 'public\images\nha1phongngu3.jpg';
        $image->images = 'public\images\nha1phongngu4.jpg';
        $image->save();

        $image = new Image();
        $image->id = 5;
        $image->roomId = 5;
        $image->images = 'public\images\nha1.jpg';
        $image->images = 'public\images\nha1phongan.jpg';
        $image->images = 'public\images\nha1phongkhach.jpg';
        $image->images = 'public\images\nha1phongngu1.jpg';
        $image->images = 'public\images\nha1phongngu2.jpg';
        $image->images = 'public\images\nha1phongngu3.jpg';
        $image->images = 'public\images\nha1phongngu4.jpg';
        $image->save();

    }
}
