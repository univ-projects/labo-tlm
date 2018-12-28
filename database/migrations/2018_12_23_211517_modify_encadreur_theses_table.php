<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyEncadreurThesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('theses', function (Blueprint $table) {
          $table->integer('encadreur_int')->unsigned()->nullable()->after('id');
          $table-> foreign('encadreur_int')->references('id')->on('users')->onDelete('set null');
          $table->integer('coencadreur_int')->unsigned()->nullable()->after('id');
          $table-> foreign('coencadreur_int')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('theses', function (Blueprint $table) {
        $table->dropForeign(['encadreur_int']);
        $table->dropColumn('encadreur_int');
        $table->dropForeign(['coencadreur_int']);
        $table->dropColumn('coencadreur_int');
      });
    }
}
