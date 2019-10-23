<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('startTime')->nullable();
            $table->date('endTime')->nullable();
            $table->integer('price');
            $table->integer('rentTime');
            $table->bigInteger('statusId')->unsigned()->default(7);
            $table->foreign('statusId')->references('id')->on('statuses');
            $table->bigInteger('userId')->unsigned();
            $table->foreign('userId')->references('id')->on('users');
            $table->bigInteger('roomId')->unsigned();
            $table->foreign('roomId')->references('id')->on('rooms');
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
        Schema::dropIfExists('contracts');
    }
}
