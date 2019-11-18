<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(RoomsSeeder::class);
        $this->call(ImagesSeeder::class);
    }
}
