<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkaterSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('skater_skills', function(Blueprint $table) {
        $table->increments('id');
        $table->integer('skater_id');
        $table->integer('condition');
        $table->integer('suspension');
        $table->integer('injury');
        $table->integer('CK');
        $table->integer('FG');
        $table->integer('DI');
        $table->integer('SK');
        $table->integer('ST');
        $table->integer('EN');
        $table->integer('DU');
        $table->integer('PH');
        $table->integer('FO');
        $table->integer('PA');
        $table->integer('SC');
        $table->integer('DF');
        $table->integer('PS');
        $table->integer('EX');
        $table->integer('LD');
        $table->integer('PO');
        $table->integer('MO');
      });
      Schema::table('skater_skills', function(Blueprint $table) {
        $table->foreign('skater_id')
              ->references('id')
              ->on('skaters');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
