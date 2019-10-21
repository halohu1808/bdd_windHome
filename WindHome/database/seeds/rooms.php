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
        $room->name = 'Phong A1';
        $room->address = 'Ha Noi';
        $room->cityId=2;
        $room->country="Viet Nam";
        $room->pricePerMonth = 3000000;
        $room->minRentTime = 6;
        $room->bathRoom = True;
        $room->area = 50;
        $room->guest = 3;
        $room->parking = True;
        $room->wifi = True;
        $room->cooking = True;
        $room->airCondition = True;
        $room->status = 1;
        $room->lat = 50;
        $room->lng = 100;
        $room->image="a3.jpg";
        $room->save();

        $room = new Room();
        $room->name = 'Phong A2';
        $room->address = 'Ho Chi Minh';
        $room->cityId=3;
        $room->country="Viet Nam";
        $room->pricePerMonth = 2000000;
        $room->minRentTime = 6;
        $room->bathRoom = True;
        $room->area = 50;
        $room->guest = 3;
        $room->parking = True;
        $room->wifi = True;
        $room->cooking = True;
        $room->airCondition = True;
        $room->status = 2;
        $room->lat = 50;
        $room->lng = 100;
        $room->image="a4.jpg";
        $room->save();

        $room = new Room();
        $room->name = 'Phong A3';
        $room->address = 'Da Nang';
        $room->cityId=3;
        $room->country="Viet Nam";
        $room->pricePerMonth = 1500000;
        $room->minRentTime = 6;
        $room->bathRoom = True;
        $room->area = 50;
        $room->guest = 3;
        $room->parking = True;
        $room->wifi = True;
        $room->cooking = True;
        $room->airCondition = True;
        $room->status =3;
        $room->lat = 50;
        $room->lng = 100;
        $room->image="a3.jpg";
        $room->save();

        $room = new Room();
        $room->name = 'Phong A4';
        $room->address = 'Da Nang';
        $room->cityId=3;
        $room->country="Viet Nam";
        $room->pricePerMonth = 1500000;
        $room->minRentTime = 6;
        $room->bathRoom = True;
        $room->area = 50;
        $room->guest = 3;
        $room->parking = True;
        $room->wifi = True;
        $room->cooking = True;
        $room->airCondition = True;
        $room->status = 4;
        $room->lat = 50;
        $room->lng = 100;
        $room->image="a4.jpg";
        $room->save();

        $room = new Room();
        $room->name = 'Phong A5';
        $room->address = 'Da Nang';
        $room->cityId=1;
        $room->country="Viet Nam";
        $room->pricePerMonth = 1500000;
        $room->minRentTime = 6;
        $room->bathRoom = True;
        $room->area = 50;
        $room->guest = 3;
        $room->parking = True;
        $room->wifi = True;
        $room->cooking = True;
        $room->airCondition = True;
        $room->status = 1;
        $room->lat = 50;
        $room->lng = 100;
        $room->image="a3.jpg";
        $room->save();
    }
}


