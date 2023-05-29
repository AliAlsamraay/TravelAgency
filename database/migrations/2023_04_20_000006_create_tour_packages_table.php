<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourPackagesTable extends Migration
{
    public function up()
    {
        Schema::create('tour_packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->float('price', 15, 4);
            $table->integer('duration')->nullable();
            $table->longText('activities')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
