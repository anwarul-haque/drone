<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address',100);
            $table->unsignedMediumInteger('zip_code')->length(6);
            $table->date('start_time');
            $table->date('end_time');
            $table->string('height');
            $table->string('purpose');
            $table->integer('user_id')->unsigned();
            $table->integer('pilot_id')->unsigned();
            $table->integer('drone_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pilot_id')->references('id')->on('users');
            $table->foreign('drone_id')->references('id')->on('drones');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flight_plans');
    }
}
