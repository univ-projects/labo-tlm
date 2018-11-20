<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterielsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiels', function (Blueprint $table) {
          $table->increments('id');
          $table->string('libelle',200);
          $table->integer('numero');
          $table->string('photo')->nullable();
          $table->text('description')->nullable();
          $table->integer('proprietaire')->unsigned()->nullable();
          $table->timestamps();

          $table-> foreign('proprietaire')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materiels');
    }
}
