<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Meeting;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class MeetingsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $meetings = Meeting::paginate(15);

        return view('admin.meetings.index', compact('meetings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.meetings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['description' => 'required', 'type' => 'required', 'datecreated' => 'required', 'dateset' => 'required', 'location' => 'required', ]);

        Meeting::create($request->all());

        Session::flash('flash_message', 'Meeting added!');

        return redirect('admin/events/meetings');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $meeting = Meeting::findOrFail($id);

        return view('admin.meetings.show', compact('meeting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $meeting = Meeting::findOrFail($id);

        return view('admin.meetings.edit', compact('meeting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['description' => 'required', 'type' => 'required', 'datecreated' => 'required', 'dateset' => 'required', 'location' => 'required', ]);

        $meeting = Meeting::findOrFail($id);
        $meeting->update($request->all());

        Session::flash('flash_message', 'Meeting updated!');

        return redirect('admin/events/meetings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        Meeting::destroy($id);

        Session::flash('flash_message', 'Meeting deleted!');

        return redirect('admin/events/meetings');
    }

}
