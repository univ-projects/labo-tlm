<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffecterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affecter', function (Blueprint $table) {
          $table->integer('materiel_id')->unsigned();
          $table->integer('user_id')->unsigned();
          $table->dateTime('from');
          $table->dateTime('to')->nullable();
          $table->timestamps();

          $table-> foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table-> foreign('materiel_id')->references('id')->on('materiels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('affecter');
    }
}
