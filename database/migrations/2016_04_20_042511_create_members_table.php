<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('members', function(Blueprint $table) {
                $table->increments('id');
                $table->string('firstname');
$table->string('lastname');
$table->string('middlename');
$table->date('birthdate');
$table->string('contactno');
$table->string('gender');
$table->string('status');
$table->string('religion');
$table->string('placeofbirth');
$table->string('jcisenatorialno');
$table->date('dateofinduction');

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
        Schema::drop('members');
    }

}
