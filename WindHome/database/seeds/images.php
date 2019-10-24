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
        $image->images = 'nha1.jpg';
        $image->images = 'nha1-1.jpg';
        $image->images = 'nha1-2.jpg';
        $image->save();

        $image = new Image();
        $image->id = 2;
        $image->roomId = 2;
        $image->images = 'nha2.jpg';
        $image->images = 'nha2-1.jpg';
        $image->images = 'nha2-2.jpg';
        $image->save();

        $image = new Image();
        $image->id = 3;
        $image->roomId = 3;
        $image->images = 'nha3.jpg';
        $image->images = 'nha3-1.jpg';
        $image->images = 'nha3-2.jpg';
        $image->save();

        $image = new Image();
        $image->id = 4;
        $image->roomId = 4;
        $image->images = 'nha4.jpg';
        $image->images = 'nha4-1.jpg';
        $image->images = 'nha4-2.jpg';
        $image->save();

    }
}
