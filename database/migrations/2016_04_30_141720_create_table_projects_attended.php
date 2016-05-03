<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProjectsAttended extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('projects_attended', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('member_id')->unsigned();
			$table->integer('project_id')->unsigned();
			$table->date('year');
			$table->foreign('member_id')->references('id')->on('members');
			$table->foreign('project_id')->references('id')->on('projects');
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
