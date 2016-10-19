<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmhlStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmhl_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('skater_id');
            $table->integer('progp');
            $table->integer('proshots');
            $table->integer('prog');
            $table->integer('proa');
            $table->integer('proplusminus');
            $table->integer('propim');
            $table->integer('profivepim');
            $table->integer('proshotsblocked');
            $table->integer('prohits');
            $table->integer('prohitstook');
            $table->integer('progw');
            $table->integer('profaceoffwon');
            $table->integer('profaceofftotal');
            $table->integer('propenaltygoals');
            $table->integer('propenaltyshots');
            $table->integer('proppg');
            $table->integer('proppa');
            $table->integer('propkg');
            $table->integer('propka');
            $table->integer('progva');
            $table->integer('protka');
        });
        Schema::table('cmhl_stats', function (Blueprint $table) {
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
        Schema::dropIfExists('cmhl_stats');
    }
}
