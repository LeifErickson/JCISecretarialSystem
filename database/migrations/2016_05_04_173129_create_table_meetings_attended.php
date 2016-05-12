<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMeetingsAttended extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('meetings_attended', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('member_id')->unsigned();
			$table->integer('meeting_id')->unsigned();
			$table->date('year');
			$table->foreign('member_id')->references('id')->on('members');
			$table->foreign('meeting_id')->references('id')->on('meetings');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('projects_attended');
    }
}
