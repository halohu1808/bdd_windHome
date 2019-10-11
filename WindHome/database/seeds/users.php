<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->id = 1;
        $user->name = 'Giap Van Sang';
        $user->email = 'sang@gmail.com';
        $user->username = 'sangdeptrai';
        $user->password = Hash::make('12345');    // co the dung bcrypt de bam;
        $user->phone = '0888888888';
        $user->address = 'Ha Noi';
        $user->roll = '1';
        $user->save();

        $user = new User();
        $user->id = 2;
        $user->name = 'Luong Manh Hai';
        $user->email = 'hailm@gmail.com';
        $user->username = 'hailmdeptrai';
        $user->password = Hash::make('12345');    // co the dung bcrypt de bam;
        $user->phone = '0888888888';
        $user->address = 'Ha Noi';
        $user->roll = '1';
        $user->save();

        $user = new User();
        $user->id = 3;
        $user->name = 'Nguyen Son Hai';
        $user->email = 'hains@gmail.com';
        $user->username = 'hainsdeptrai';
        $user->password = Hash::make('12345');    // co the dung bcrypt de bam;
        $user->phone = '0888888888';
        $user->address = 'Phu Tho';
        $user->roll = '1';
        $user->save();

        $user = new User();
        $user->id = 4;
        $user->name = 'Tran Van Huy';
        $user->email = 'huy@gmail.com';
        $user->username = 'huydeptrai';
        $user->password = Hash::make('12345');    // co the dung bcrypt de bam;
        $user->phone = '0888888888';
        $user->address = 'Hai Phong';
        $user->roll = '2';
        $user->save();

        $user = new User();
        $user->id = 5;
        $user->name = 'Nguyen Dinh Huy';
        $user->email = 'huynd@gmail.com';
        $user->username = 'huynddeptrai';
        $user->password = Hash::make('12345');    // co the dung bcrypt de bam;
        $user->phone = '0888888888';
        $user->address = 'Ha Noi';
        $user->roll = '2';
        $user->save();


    }
}
