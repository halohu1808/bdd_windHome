<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('city');
            $table->string('country')->nullable();
            $table->integer('pricePerMonth');
            $table->integer('minRentTime');
            $table->boolean('bathRoom')->nullable();
            $table->integer('area')->nullable();
            $table->smallInteger('guest')->nullable();
            $table->boolean('parking')->nullable();
            $table->boolean('wifi')->nullable();
            $table->boolean('cooking')->nullable();
            $table->boolean('airCondition')->nullable();
            $table->boolean('status')->nullable();
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
