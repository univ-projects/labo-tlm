<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->integer('partenaire_id')->unsigned();
          $table->text('description');
          $table->date('from');
          $table->date('to');
          $table->timestamps();
          $table-> foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table-> foreign('partenaire_id')->references('id')->on('partenaires')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stages');
    }
}
