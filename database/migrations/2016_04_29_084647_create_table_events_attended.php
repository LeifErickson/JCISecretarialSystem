<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEventsAttended extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('events_attended', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('member_id')->unsigned();
			$table->integer('event_id')->unsigned();
			$table->date('year');
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
        Schema::drop('events_attended');
    }
}