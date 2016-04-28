<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Project as Project;
use Illuminate\Http\Request;
use DB;
use DateTime;

class AttendanceController extends Controller
{
	public function index()
	{
		/*
		$proj = new Project();
		
		$result = $proj->orderBy('year', 'desc')->paginate(5);
		return view('admin.event.index')->with('data',$result);
		
		*/
		return view('admin.attendance.index');
	}
	public function addEventForm()
	{
		//return view('admin.event.addEvent');
	}
	
	 public function store(Request $request)
    {
	 /*
		$now = new DateTime();
		$title = $request->input('title');
		$date = $request->input('date');
		$description = $request->input('description');
		DB::insert('INSERT INTO `project`(`member_id`, `finance_id`, `name`, `description`,`year`) 
		VALUES (?,?,?,?,?)', [1,1, "$title","$description",$now]);
		
		  return redirect('admin/event');
		  */
    }
	public function delete($id)
	{
		/*
		DB::insert('DELETE FROM `project` WHERE `id`=?', [$id]);
		return back();
		*/
	}
	public function updateForm($id)
	{	
		//$result = DB::select('SELECT * FROM `project`  WHERE  `id`=?',[$id]);
		
		//return view('admin.event.updateEvent')->with('data',$result);
	}
	public function updateEvent(Request $request)
	{	/*
		$id = $request->input('id');
		$title = $request->input('title');
		$date = $request->input('date');
		$description = $request->input('description');
		DB::insert('UPDATE `project` SET `member_id`=?,`finance_id`=?,`name`=?,`description`=?
		WHERE `id`=?', [1,1, "$title","$description",$id]);
		
		 return redirect('admin/event');
		 */
	}
}
