<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBookingsTable extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_8362731')->references('id')->on('users');
            $table->unsignedBigInteger('tour_package_id')->nullable();
            $table->foreign('tour_package_id', 'tour_package_fk_8362753')->references('id')->on('tour_packages');
        });
    }
}
