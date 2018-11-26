<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCategoryIdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('materiels', function (Blueprint $table) {
          $table->integer('category_id')->unsigned()->nullable()->after('id');
          $table-> foreign('category_id')->references('id')->on('category')->onDelete('set null');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('materiels', function (Blueprint $table) {
          $table->dropForeign(['category_id']);
          $table->dropColumn('category_id');
      });
    }
}
