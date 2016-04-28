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
			$table->integer('project_id')->unsigned();
			$table->date('year');
			$table->foreign('member_id')->references('id')->on('members');
			$table->foreign('project_id')->references('id')->on('project');
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
