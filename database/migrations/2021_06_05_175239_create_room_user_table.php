<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomUserTable extends Migration
{
    public function up()
    {
        Schema::create('room_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->decimal('price');
            $table->integer('total');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('room_user');
    }
}
