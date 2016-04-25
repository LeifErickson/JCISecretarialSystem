<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Project as Project;
use Illuminate\Http\Request;

class EventsController extends Controller
{
	public function index()
	{
		 return view('admin.event.index');
	}
	public function add()
	{
		return view('admin.event.addEvent');
	}
}
