<?php

namespace App\Repositories;

use App\Models\Project;
use InfyOm\Generator\Common\BaseRepository;

class ProjectRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return Project::class;
    }
}
