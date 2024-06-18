<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->integer('price');
            $table->string('distance');
            $table->string('image');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('houses');
    }
}
