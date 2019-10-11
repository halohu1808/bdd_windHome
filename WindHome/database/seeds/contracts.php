<?php

use App\Contract;
use Illuminate\Database\Seeder;

class contracts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contruct = new Contract();
        $contruct->id = 1;
        $contruct->date = '2019-12-12';
        $contruct->price = 30000000;
        $contruct->rentTime = 10;
        $contruct->userId = 1;
        $contruct->roomId = 1;
        $contruct->save();

        $contruct = new Contract();
        $contruct->id = 2;
        $contruct->date = '2019-12-12';
        $contruct->price = 20000000;
        $contruct->rentTime = 10;
        $contruct->userId = 1;
        $contruct->roomId = 1;
        $contruct->save();

        $contruct = new Contract();
        $contruct->id = 3;
        $contruct->date = '2019-12-12';
        $contruct->price = 15000000;
        $contruct->rentTime = 10;
        $contruct->userId = 1;
        $contruct->roomId = 1;
        $contruct->save();

    }
}
