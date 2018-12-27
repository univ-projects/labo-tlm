<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyContactExtThesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('theses', function (Blueprint $table) {
          $table->integer('coencadreur_ex')->unsigned()->nullable()->after('id');
        //  $table-> foreign('coencadreur_extern')->references('id')->on('contacts')->onDelete('set null');
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
          // $table->dropForeign(['coencadreur_extern']);
          $table->dropColumn('coencadreur_ex');
      });
    }
}
