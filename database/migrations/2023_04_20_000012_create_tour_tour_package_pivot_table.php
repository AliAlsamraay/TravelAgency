<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourTourPackagePivotTable extends Migration
{
    public function up()
    {
        Schema::create('tour_tour_package', function (Blueprint $table) {
            $table->unsignedBigInteger('tour_id');
            $table->foreign('tour_id', 'tour_id_fk_8360562')->references('id')->on('tours')->onDelete('cascade');
            $table->unsignedBigInteger('tour_package_id');
            $table->foreign('tour_package_id', 'tour_package_id_fk_8360562')->references('id')->on('tour_packages')->onDelete('cascade');
        });
    }
}
