<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkatersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('skaters', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('number');
        $table->string('name');
        $table->integer('team');
        $table->string('country');
        $table->string('agedate');
        $table->integer('weight');
        $table->integer('height');
        $table->boolean('posc');
        $table->boolean('poslw');
        $table->boolean('posrw');
        $table->boolean('posd');
        $table->integer('contract');
        $table->boolean('rookie');
        $table->integer('salary');
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
