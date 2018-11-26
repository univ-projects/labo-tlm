<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyParametresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parametres', function (Blueprint $table) {
            $table->string('achronymes');//initial
            $table->string('photo');
            $table->text('apropos');
            $table-> integer('directeur')->unsigned()->nullable()->after('id');
            $table-> foreign('directeur')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('parametres', function($table) {
        $table->dropColumn('achronymes');
        $table->dropColumn('photo');
        $table->dropColumn('papropos');
        $table->dropForeign(['directeur']);
        $table->dropColumn('directeur');
      });
    }
}
