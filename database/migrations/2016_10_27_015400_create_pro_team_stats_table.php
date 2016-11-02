<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProTeamStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_team_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('team_id');
            $table->integer('gp');
            $table->integer('w');
            $table->integer('l');
            $table->integer('t');
            $table->integer('otw');
            $table->integer('otl');
            $table->integer('sow');
            $table->integer('sol');
            $table->integer('gf');
            $table->integer('ga');
            $table->integer('pp');
            $table->integer('ppg');
            $table->integer('pk');
            $table->integer('pkga');
            $table->integer('pkgf');
            $table->integer('shots');
            $table->integer('shots_allowed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pro_team_stats');
    }
}
