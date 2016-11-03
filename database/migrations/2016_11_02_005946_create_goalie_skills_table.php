<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalieSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goalie_skills', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('goalie_id');
          $table->integer('condition');
          $table->integer('suspension');
          $table->string('injury');
          $table->integer('sk');
          $table->integer('du');
          $table->integer('en');
          $table->integer('sz');
          $table->integer('ag');
          $table->integer('rb');
          $table->integer('sc');
          $table->integer('hs');
          $table->integer('rt');
          $table->integer('ph');
          $table->integer('ps');
          $table->integer('ex');
          $table->integer('ld');
          $table->integer('po');
          $table->integer('mo');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goalie_skills');
    }
}
