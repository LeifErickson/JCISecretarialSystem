<?php

use Faker\Factory as Faker;
use App\Models\Project;
use App\Repositories\ProjectRepository;

trait MakeProjectTrait
{
    /**
     * Create fake instance of Project and save it in database
     *
     * @param array $projectFields
     * @return Project
     */
    public function makeProject($projectFields = [])
    {
        /** @var ProjectRepository $projectRepo */
        $projectRepo = App::make(ProjectRepository::class);
        $theme = $this->fakeProjectData($projectFields);
        return $projectRepo->create($theme);
    }

    /**
     * Get fake instance of Project
     *
     * @param array $projectFields
     * @return Project
     */
    public function fakeProject($projectFields = [])
    {
        return new Project($this->fakeProjectData($projectFields));
    }

    /**
     * Get fake data of Project
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProjectData($projectFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id' => $fake->word,
            'name' => $fake->word,
            'description' => $fake->word,
            'chapter' => $fake->word,
            'mailingaddress' => $fake->word,
            'nationalorganization' => $fake->word,
            'objectives' => $fake->word,
            'actiontaken' => $fake->word,
            'results' => $fake->word,
            'recommendation' => $fake->word,
            'datebegun' => $fake->word,
            'datecompleted' => $fake->word,
            'totalincomeprojected' => $fake->word,
            'expendituresprojected' => $fake->word,
            'approvedbychairman' => $fake->word,
            'numberofvolunteers' => $fake->word,
            'totalincomeannual' => $fake->word,
            'expendituresactual' => $fake->word,
            'approvedbychapterpresident' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $projectFields);
    }
}
