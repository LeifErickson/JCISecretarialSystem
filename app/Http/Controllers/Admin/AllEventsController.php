<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Member;
use DB;
use App\Models\Project;
use Illuminate\Http\Request;


class AllEventsController extends Controller
{
	public function index()
	{
		$events = DB::table('events')->orderBy('year', 'desc')->get();
		$meetings = DB::table('meetings')->orderBy('created_at', 'desc')->get();
		$projects = DB::table('projects')->orderBy('created_at', 'desc')->get();
		return view('admin.allevents.index')
			->with('projects', $projects)
			->with('meetings', $meetings)
			->with('events', $events);
	}
}
