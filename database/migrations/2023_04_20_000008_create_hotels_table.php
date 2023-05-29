<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('address')->nullable();
            $table->float('rating', 2, 1)->nullable();
            $table->integer('available_rooms')->nullable();
            $table->float('price_per_night', 10, 3)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
