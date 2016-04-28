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
        
        $table->String('membershiptype');
        
        $table->String('firstname');
        
        $table->String('lastname');
        
        $table->String('middlename');
        
        $table->String('emailaddress');
        
        $table->String('cellphonenumber');
        
        $table->String('residenceaddress');
        
        $table->String('residencetelephoneno');
        
        $table->String('residencefaxno');
        
        $table->String('officeaddress');
        
        $table->String('officetelephoneno');
        
        $table->String('officefaxno');
        
        $table->String('nameandaddressofcompany');
        
        $table->String('profession');
        
        $table->String('companyposition');
        
        $table->String('gender');
        
        $table->String('status');
        
        $table->String('religion');
        
        $table->date('birthdate');
        
        $table->String('placeofbirth');
        
        $table->String('elementaryschool');
        
        $table->String('elementaryyeargrad');
        
        $table->String('collegeschool');
        
        $table->String('coursetaken');
        
        $table->String('collegeyeargraduated');
        
        $table->String('memberstatus');
        
        $table->String('lomhighestposition');
        
        $table->String('lomhighestpositionyear');
        
        $table->String('lomawardsrecieved');
        
        $table->String('areahighestposition');
        
        $table->String('areahighestpositionyear');
        
        $table->String('regionalhighestposition');
        
        $table->String('regionalhighestpositionyear');
        
        $table->String('regionalawardsrecieved');
        
        $table->String('highestjcinternationalposition');
        
        $table->String('highestjcinternationalpositionyear');
        
        $table->String('internationalawardsrecieved');
        
        $table->String('jcisenatorialno');
        
        $table->String('dateofinduction');

        $table->date('membersince');

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
