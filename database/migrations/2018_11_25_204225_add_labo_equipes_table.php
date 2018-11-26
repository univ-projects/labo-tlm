<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLaboEquipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('equipes', function (Blueprint $table) {
          $table-> integer('labo_id')->unsigned()->nullable()->after('id');
          $table-> foreign('labo_id')->references('id')->on('parametres')->onDelete('set null');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('equipes', function (Blueprint $table) {
          $table->dropForeign(['labo_id']);
          $table->dropColumn('labo_id');
      });
    }
}
