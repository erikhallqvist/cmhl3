<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmhlGoalieStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmhl_goalie_stats', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('goalie_id');
          $table->integer('progp');
          $table->integer('protime');
          $table->integer('prow');
          $table->integer('prol');
          $table->integer('prootl');
          $table->integer('proso');
          $table->integer('proga');
          $table->integer('propim');
          $table->integer('proa');
          $table->integer('props');
          $table->integer('propsga');
          $table->integer('prostarts');
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
        Schema::dropIfExists('cmhl_goalie_stats');
    }
}
