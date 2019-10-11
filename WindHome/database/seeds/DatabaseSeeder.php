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
        $this->call(users::class);
        $this->call(rooms::class);
        $this->call(comments::class);
        $this->call(contracts::class);
        $this->call(images::class);
    }
}
