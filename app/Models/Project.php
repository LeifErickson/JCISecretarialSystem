<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Project",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="datebegun",
 *          description="datebegun",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="datecompleted",
 *          description="datecompleted",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Project extends Model
{
    use SoftDeletes;

    public $table = 'projects';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'datebegun' => 'date',
        'datecompleted' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
