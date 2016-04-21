<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'members';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'middlename', 'birthdate', 'cellphonenumber', 'gender', 'status', 'religion', 'placeofbirth', 'jcisenatorialno', 'dateofinduction'];

}
