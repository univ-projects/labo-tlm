<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartenairesProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projet_partenaire', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('partenaire_id')->unsigned();
          $table->integer('projet_id')->unsigned();
          $table->timestamps();

          $table-> foreign('partenaire_id')->references('id')->on('partenaires')->onDelete('cascade');
          $table-> foreign('projet_id')->references('id')->on('projets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projet_partenaire');
    }
}
