<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
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
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('12345');    // co the dung bcrypt de bam;
        $user->phone = '0888888888';
        $user->address = 'Ha Noi';
        $user->roll = '1';
        $user->save();

        $user = new User();
        $user->id = 2;
        $user->name = 'Luong Manh Hai';
        $user->email = 'hai@gmail.com';
        $user->password = Hash::make('12345');    // co the dung bcrypt de bam;
        $user->phone = '0888888888';
        $user->address = 'Ha Noi';
        $user->roll = '1';
        $user->save();

        $user = new User();
        $user->id = 3;
        $user->name = 'Tran Van Huy';
        $user->email = 'huy@gmail.com';
        $user->password = Hash::make('12345');    // co the dung bcrypt de bam;
        $user->phone = '0888888888';
        $user->address = 'Hai Phong';
        $user->roll = '2';
        $user->save();

        $user = new User();
        $user->id = 4;
        $user->name = 'Dam Quang Duc';
        $user->email = 'duc@gmail.com';
        $user->password = Hash::make('12345');    // co the dung bcrypt de bam;
        $user->phone = '0888888888';
        $user->address = 'Ha Noi';
        $user->roll = '2';
        $user->save();

    }
}
