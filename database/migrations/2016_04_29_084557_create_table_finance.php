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
                $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
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