<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('home_type');
            $table->string('room_type');
            $table->integer('total_occupancy');
            $table->integer('total_bedrooms');
            $table->integer('total_bathrooms');
            $table->string('summary',1000);
            $table->string('address');
            $table->boolean('has_tv');
            $table->boolean('has_kitchen');
            $table->boolean('has_air_con');
            $table->boolean('has_heating');
            $table->boolean('has_internet');
            $table->decimal('price');
            $table->dateTime('published_at');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
