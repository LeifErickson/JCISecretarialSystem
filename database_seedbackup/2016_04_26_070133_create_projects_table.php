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
            $table->varchar('name');
            $table->varchar('description');
            $table->varchar('chapter');
            $table->varchar('mailingaddress');
            $table->varchar('nationalorganization');
            $table->varchar('objectives');
            $table->varchar('actiontaken');
            $table->varchar('results');
            $table->varchar('recommendation');
            $table->timestamp('datebegun');
            $table->timestamp('datecompleted');
            $table->varchar('totalincomeprojected');
            $table->varchar('expendituresprojected');
            $table->varchar('approvedbychairman');
            $table->varchar('numberofvolunteers');
            $table->varchar('totalincomeannual');
            $table->varchar('expendituresactual');
            $table->varchar('approvedbychapterpresident');
            $table->timestamps();
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
