<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('project_contact', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('contact_id')->unsigned();
          $table->integer('project_id')->unsigned();
          $table->timestamps();

          $table-> foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
          $table-> foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_contact');
    }
}
