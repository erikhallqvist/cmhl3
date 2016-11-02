<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoaliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goalies', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('unique');
            $table->string('name');
            $table->integer('team');
            $table->string('country');
            $table->string('agedate');
            $table->integer('weight');
            $table->integer('height');
            $table->integer('contract');
            $table->boolean('rookie');
            $table->integer('salary');
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goalies');
    }
}
