<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentsTable extends Migration
{
 
    public function up()
    {
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('houseId');
            $table->foreign('houseId')->references('id')->on('houses');
            $table->string('compo_name');
            $table->string('image');
            $table->timestamps();
        });
    }
 
    public function down()
    {
        Schema::dropIfExists('components');
    }
}
