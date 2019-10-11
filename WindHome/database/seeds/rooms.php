<?php

use App\Room;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class rooms extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room = new Room();
        $room->id = 1;
        $room->name = 'Phong A1';
        $room->address = 'Ha Noi';
        $room->pricePerMonth = 3000000;
        $room->minRentTime = 6;
        $room->bathRoom = True;
        $room->area = 50;
        $room->guest = 3;
        $room->parking = True;
        $room->wifi = True;
        $room->cooking = True;
        $room->airCondition = True;
        $room->status = False;
        $room->lat = 50;
        $room->lng = 100;
        $room->save();

        $room = new Room();
        $room->id = 2;
        $room->name = 'Phong A2';
        $room->address = 'Ho Chi Minh';
        $room->pricePerMonth = 2000000;
        $room->minRentTime = 6;
        $room->bathRoom = True;
        $room->area = 50;
        $room->guest = 3;
        $room->parking = True;
        $room->wifi = True;
        $room->cooking = True;
        $room->airCondition = True;
        $room->status = False;
        $room->lat = 50;
        $room->lng = 100;
        $room->save();

        $room = new Room();
        $room->id = 3;
        $room->name = 'Phong A3';
        $room->address = 'Da Nang';
        $room->pricePerMonth = 1500000;
        $room->minRentTime = 6;
        $room->bathRoom = True;
        $room->area = 50;
        $room->guest = 3;
        $room->parking = True;
        $room->wifi = True;
        $room->cooking = True;
        $room->airCondition = True;
        $room->status = False;
        $room->lat = 50;
        $room->lng = 100;
        $room->save();

        $room = new Room();
        $room->id = 4;
        $room->name = 'Phong A4';
        $room->address = 'Hue';
        $room->pricePerMonth = 1000000;
        $room->minRentTime = 6;
        $room->bathRoom = True;
        $room->area = 50;
        $room->guest = 3;
        $room->parking = True;
        $room->wifi = True;
        $room->cooking = True;
        $room->airCondition = True;
        $room->status = False;
        $room->lat = 50;
        $room->lng = 100;
        $room->save();

        $room = new Room();
        $room->id = 5;
        $room->name = 'Phong A5';
        $room->address = 'Vinh Phuc';
        $room->pricePerMonth = 4000000;
        $room->minRentTime = 6;
        $room->bathRoom = True;
        $room->area = 50;
        $room->guest = 3;
        $room->parking = True;
        $room->wifi = True;
        $room->cooking = True;
        $room->airCondition = True;
        $room->status = False;
        $room->lat = 50;
        $room->lng = 100;
        $room->save();

        $room = new Room();
        $room->id = 6;
        $room->name = 'Phong A6';
        $room->address = 'Ha Noi';
        $room->pricePerMonth = 3000000;
        $room->minRentTime = 6;
        $room->bathRoom = True;
        $room->area = 50;
        $room->guest = 3;
        $room->parking = True;
        $room->wifi = True;
        $room->cooking = True;
        $room->airCondition = True;
        $room->status = False;
        $room->lat = 50;
        $room->lng = 100;
        $room->save();

        $room = new Room();
        $room->id = 7;
        $room->name = 'Phong A7';
        $room->address = 'Vinh Long';
        $room->pricePerMonth = 500000;
        $room->minRentTime = 6;
        $room->bathRoom = True;
        $room->area = 50;
        $room->guest = 3;
        $room->parking = True;
        $room->wifi = True;
        $room->cooking = True;
        $room->airCondition = True;
        $room->status = False;
        $room->lat = 50;
        $room->lng = 100;
        $room->save();

        $room = new Room();
        $room->id = 8;
        $room->name = 'Phong A8';
        $room->address = 'Ha Noi';
        $room->pricePerMonth = 10000000;
        $room->minRentTime = 6;
        $room->bathRoom = True;
        $room->area = 50;
        $room->guest = 3;
        $room->parking = True;
        $room->wifi = True;
        $room->cooking = True;
        $room->airCondition = True;
        $room->status = False;
        $room->lat = 50;
        $room->lng = 100;
        $room->save();

        $room = new Room();
        $room->id = 9;
        $room->name = 'Phong A9';
        $room->address = 'Hue';
        $room->pricePerMonth = 10000000;
        $room->minRentTime = 6;
        $room->bathRoom = True;
        $room->area = 50;
        $room->guest = 3;
        $room->parking = True;
        $room->wifi = True;
        $room->cooking = True;
        $room->airCondition = True;
        $room->status = False;
        $room->lat = 50;
        $room->lng = 100;
        $room->save();

        $room = new Room();
        $room->id = 10;
        $room->name = 'Phong A10';
        $room->address = 'Nha Trang';
        $room->pricePerMonth = 3000000;
        $room->minRentTime = 6;
        $room->bathRoom = True;
        $room->area = 50;
        $room->guest = 3;
        $room->parking = True;
        $room->wifi = True;
        $room->cooking = True;
        $room->airCondition = True;
        $room->status = False;
        $room->lat = 50;
        $room->lng = 100;
        $room->save();

    }
}


