<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTheseContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('these_contact', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('contact_id')->unsigned();
          $table->integer('these_id')->unsigned();
          $table->timestamps();

          $table-> foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
          $table-> foreign('these_id')->references('id')->on('theses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('these_contact');
    }
}
