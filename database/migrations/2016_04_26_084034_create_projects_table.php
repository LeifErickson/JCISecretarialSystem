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
            $table->timestamps();
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
