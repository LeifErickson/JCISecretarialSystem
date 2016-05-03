<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateprojectsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eventtype')->default('projects');
            $table->string('name');
            $table->string('description');
            $table->string('chapter');
            $table->string('mailingaddress');
            $table->string('nationalorganization');
            $table->string('objectives');
            $table->string('actiontaken');
            $table->string('results');
            $table->string('recommendation');
            $table->date('datebegun');
            $table->date('datecompleted');
            $table->string('totalincomeprojected');
            $table->string('expendituresprojected');
            $table->string('approvedbychairman');
            $table->string('numberofvolunteers');
            $table->string('totalincomeannual');
            $table->string('expendituresactual');
            $table->string('approvedbychapterpresident');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projects');
    }
}
