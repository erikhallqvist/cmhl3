<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUfaOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *
     * It'd be nice if we could have used a foreign key to players as well
     * but sadly, we'll have to do with a string representation rather than
     * risking that player ids change between seasons.
     *
     */
    public function up()
    {
        Schema::create('ufa_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('player_name');
            $table->boolean('isAccepted');
            $table->integer('years');
            $table->integer('salary');
            $table->integer('reason_id')->unsigned();
            $table->integer('team_id')->unsigned();
        });
        Schema::table('ufa_offers', function (Blueprint $table) {
            $table->foreign('reason_id')
              ->references('id')
              ->on('ufa_reasons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ufa_offers');
    }
}
