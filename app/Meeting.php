<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'meetings';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['description', 'agenda', 'type', 'datecreated', 'dateset', 'location', 'leadby', 'minutetaker', 'started', 'ended'];

}
