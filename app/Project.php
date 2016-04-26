<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
            'id',
            'name',
            'description',
            'chapter',
            'mailingaddress',
            'nationalorganization',
            'objectives',
            'actiontaken',
            'results',
            'recommendation',
            'datebegun',
            'datecompleted',
            'totalincomeprojected',
            'expendituresprojected',
            'approvedbychairman',
            'numberofvolunteers',
            'totalincomeannual',
            'expendituresactual',
            'approvedbychapterpresident'
    ];

}
