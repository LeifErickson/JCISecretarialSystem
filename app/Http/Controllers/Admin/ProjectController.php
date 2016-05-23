<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;
use Flash;
use App\Http\Controllers\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Project;
use Session;
use DB;
class ProjectController extends AppBaseController
{
    /** @var  ProjectRepository */
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepo)
    {
        $this->projectRepository = $projectRepo;
    }

    /**
     * Display a listing of the Project.
     *
     * @param Request $request
     * @return Response
     */
    public function index()
    {
        $projects = Project::paginate(999999);

        return view('projects.index')
            ->with('projects', $projects);
    }

    /**
     * Show the form for creating a new Project.
     *
     * @return Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created Project in storage.
     *
     * @param CreateProjectRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectRequest $request)
    {
        $input = $request->all();

        $project = $this->projectRepository->create($input);

        Flash::success('Project saved successfully.');

        return redirect(route('admin.events.projects.index'));
    }

    /**
     * Display the specified Project.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('admin.events.projects.index'));
        }

        return view('projects.show')->with('project', $project);
    }

    /**
     * Show the form for editing the specified Project.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $project = $this->projectRepository->findWithoutFail($id);
			$dates = DB::select('SELECT `datebegun`,`datecompleted` FROM `projects` WHERE  `id` = ?',[$id]);
        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('admin.events.projects.index'));
        }

        return view('projects.edit')->with('project', $project)->with('dates', $dates);
    }

    /**
     * Update the specified Project in storage.
     *
     * @param  int              $id
     * @param UpdateProjectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectRequest $request)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('admin.events.projects.index'));
        }

        $project = $this->projectRepository->update($request->all(), $id);

        Flash::success('Project updated successfully.');

        return redirect(route('admin.events.projects.index'));
    }

    /**
     * Remove the specified Project from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('admin.events.projects.index'));
        }

        $this->projectRepository->delete($id);

        Flash::success('Project deleted successfully.');

        return redirect(route('admin.events.projects.index'));
    }
}
