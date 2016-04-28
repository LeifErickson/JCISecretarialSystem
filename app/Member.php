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
    protected $fillable = [
        
        'membershiptype',
        
        'firstname',
        
        'lastname',
        
        'middlename',
        
        'emailaddress',
        
        'cellphonenumber',
        
        'residenceaddress',
        
        'residencetelephoneno',
        
        'residencefaxno',
        
        'officeaddress',
        
        'officetelephoneno',
        
        'officefaxno',
        
        'nameandaddressofcompany',
        
        'profession',
        
        'companyposition',
        
        'gender',
        
        'status',
        
        'religion',
        
        'birthdate',
        
        'placeofbirth',
        
        'elementaryschool',
        
        'elementaryyeargrad',
        
        'collegeschool',
        
        'coursetaken',
        
        'collegeyeargraduated',
        
        'memberstatus',
        
        'lomhighestposition',
        
        'lomhighestpositionyear',
        
        'lomawardsrecieved',
        
        'areahighestposition',
        
        'areahighestpositionyear',
        
        'regionalhighestposition',
        
        'regionalhighestpositionyear',
        
        'regionalawardsrecieved',
        
        'highestjcinternationalposition',
        
        'highestjcinternationalpositionyear',
        
        'internationalawardsrecieved',
        
        'jcisenatorialno',
        
        'dateofinduction',

        'membersince'
    ];

}
