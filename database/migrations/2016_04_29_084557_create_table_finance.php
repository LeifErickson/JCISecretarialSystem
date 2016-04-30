<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFinance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('finances', function(Blueprint $table) {
				$table->increments('id');
				$table->integer('member_id')->unsigned();
				$table->integer('event_id')->unsigned();
				$table->string('amount');
				$table->foreign('member_id')->references('id')->on('members');
				$table->foreign('event_id')->references('id')->on('events');
			});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('finances');
    }
}