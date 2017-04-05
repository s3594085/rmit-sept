<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('bookings', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id');
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->integer('employee_id');
          $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
          $table->date('date');
          $table->time('start');
          $table->time('end');
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
        Schema::dropIfExists('bookings');
    }
}
