<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeeTime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      /*

      Weekday      Letter
      -------      ------
      Sunday       S
      Monday       M
      Tuesday      T
      Wednesday    W
      Thursday     R
      Friday       F
      Saturday     U

      */

        //
        Schema::create('employee_times', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->char('day', 2);
            $table->timestamp('start');
            $table->timestamp('end');
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
        //
        Schema::dropIfExists('employee_times');
    }
}
