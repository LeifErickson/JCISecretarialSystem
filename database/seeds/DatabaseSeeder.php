<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        $this->call(AccessTableSeeder::class);

        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        Model::reguard();

        $faker = Faker::create();        
        
        /*
        *
        *   MEMBER FAKER 
        *
        */

        foreach (range(100,500) as $index) {
            DB::table('members')->insert([

                'membershiptype'=> $faker->randomElement($array = array ('Baby JC','Regular','Associate')),

                'firstname'=> $faker->firstName,
                
                'lastname'=> $faker->firstName,
                
                'middlename'=> $faker->lastName,
                
                'emailaddress'=> $faker->email,
                
                'cellphonenumber'=> $faker->phoneNumber,
                
                'residenceaddress'=> $faker->address,
                
                'residencetelephoneno'=> $faker->phoneNumber,
                
                'residencefaxno'=> $faker->phoneNumber,
                
                'officeaddress'=> $faker->address,
                
                'officetelephoneno'=> $faker->phoneNumber,
                
                'officefaxno'=> $faker->phoneNumber,
                
                'nameandaddressofcompany'=> $faker->address,
                
                'profession'=> $faker->word,
                
                'companyposition'=> $faker->word,
                
                'gender'=> $faker->title,
                
                'status'=> $faker->randomElement($array = array ('single','married','its complicated')),
                
                'religion'=> $faker->word,
                
                'birthdate'=> $faker->dateTimeBetween($startDate = "-30 years", $endDate = "now")->format('Y-m-d'),
                
                'placeofbirth'=> $faker->city,
                
                'elementaryschool'=> $faker->word,
                
                'elementaryyeargrad'=> $faker->year($max = 'now'),
                
                'collegeschool'=> $faker->word,
                
                'coursetaken'=> $faker->word,
                
                'collegeyeargraduated'=> $faker->year($max = 'now'),
                
                'memberstatus'=> $faker->randomElement($array = array ('inactive','active')),
                
                'lomhighestposition'=> $faker->word,
                
                'lomhighestpositionyear'=> $faker->year($max = 'now'),
                
                'lomawardsrecieved'=> $faker->word,
                
                'areahighestposition'=> $faker->word,
                
                'areahighestpositionyear'=> $faker->year($max = 'now'),
                
                'regionalhighestposition'=> $faker->word,
                
                'regionalhighestpositionyear'=> $faker->year($max = 'now'),
                
                'regionalawardsrecieved'=> $faker->word,
                
                'highestjcinternationalposition'=> $faker->word,
                
                'highestjcinternationalpositionyear'=> $faker->year($max = 'now'),
                
                'internationalawardsrecieved'=> $faker->word,
                
                'jcisenatorialno'=> $faker->numberBetween($min = 1, $max = 9000),
                
                'dateofinduction'=> $faker->dateTimeBetween($startDate = "-5 years", $endDate = "now")->format('Y-m-d'),

                'membersince'=> $faker->dateTimeBetween($startDate = "-5 years", $endDate = "now")->format('Y-m-d')
                ]);
            }


        /*
        *
        *   PROJECT FAKER 
        *
        */


        foreach (range(100,500) as $index) {
            DB::table('projects')->insert([
                'name'=> $faker->firstName,
                'description' => $faker->word,
                'chapter' => $faker->word,
                'mailingaddress' => $faker->address,
                'nationalorganization' => $faker->word, 
                'objectives' => $faker->word,
                'actiontaken' => $faker->word,
                'results' => $faker->word,
                'recommendation' => $faker->word,
                'datebegun' => $faker->dateTimeBetween($startDate = "-30 years", $endDate = "now")->format('Y-m-d'),
                'datecompleted'=> $faker->dateTimeBetween($startDate = "-30 years", $endDate = "now")->format('Y-m-d'),
                'totalincomeprojected'=> $faker->numberBetween($min = 1, $max = 9000),
                'expendituresprojected'=> $faker->numberBetween($min = 1, $max = 9000),
                'approvedbychairman' => $faker->randomElement($array = array ('yes','no')),
                'numberofvolunteers'=> $faker->numberBetween($min = 1, $max = 9000),
                'totalincomeannual'=> $faker->numberBetween($min = 1, $max = 9000),
                'expendituresactual'=> $faker->numberBetween($min = 1, $max = 9000),
                'approvedbychapterpresident' => $faker->randomElement($array = array ('yes','no'))
                ]);
            }
        
    }


}
