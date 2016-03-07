<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('members', function (Blueprint $table) {
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
            $table->string('jcisenatorialno')->nullable();
            $table->date('dateofinduction')->default('0000-00-00');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
