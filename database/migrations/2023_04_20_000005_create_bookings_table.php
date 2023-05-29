<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->date('booking_date');
            $table->integer('num_of_persons');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
