<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
          $table->integer('publicateur')->unsigned()->nullable()->after('id');
          $table-> foreign('publicateur')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('articles', function (Blueprint $table) {
        $table->dropForeign(['publicateur']);
        $table->dropColumn('publicateur');
      });
    }
}
