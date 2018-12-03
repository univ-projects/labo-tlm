<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnProprietaireEquipeAffecterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('affecter', function (Blueprint $table) {
          $table->integer('proprietaireEquipe')->unsigned()->nullable()->after('id');
          $table-> foreign('proprietaireEquipe')->references('id')->on('equipes')->onDelete('set null');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('affecter', function (Blueprint $table) {
          $table->dropForeign(['proprietaireEquipe']);
          $table->dropColumn('proprietaireEquipe');
      });
    }
}
