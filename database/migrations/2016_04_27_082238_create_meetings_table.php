<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('meetings', function(Blueprint $table) {
                $table->increments('id');
                $table->string('eventtype')->default('meetings');
                $table->string('description');
                $table->string('agenda');
                $table->string('type');
                $table->date('datecreated');
                $table->date('dateset');
                $table->string('location');
                $table->string('leadby');
                $table->string('minutetaker');
                $table->string('started');
                $table->string('ended');
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
        Schema::drop('meetings');
    }

}
