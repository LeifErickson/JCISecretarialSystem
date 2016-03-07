<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Member extends Model
{
   protected $fillable = [
       'firstname',
       'lastname',
       'middlename',
       'birthdate',
       'contactno',
       'gender',
       'status',
       'religion',
       'placeofbirth',
       'jcisenatorialno',
       'dateofinduction'
   ];

    // public function setBirthDateAttribute($birthdate)
    // {
    // 		$this->birthdate = Carbon::parse($birthdate)->format("Y-m-d");

    // }
}
