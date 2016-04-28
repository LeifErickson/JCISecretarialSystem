<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Project as Project;
use Illuminate\Http\Request;
use DB;
class EventsController extends Controller
{
	public function index()
	{
		$proj = new Project();
		
		$result = $proj->paginate(5);
		 return view('admin.event.index')->with('data',$result);
	}
	public function addEventForm()
	{
		return view('admin.event.addEvent');
	}
	
	 public function store(Request $request)
    {
		$title = $request->input('title');
		$date = $request->input('date');
		$description = $request->input('description');
		DB::insert('INSERT INTO `project`(`member_id`, `finance_id`, `name`, `description`,`year`) 
		VALUES (?,?,?,?,?)', [1,1, "$title","$description","$date"]);
		
		 return back();
    }
	public function delete($id)
	{
		DB::insert('DELETE FROM `project` WHERE `id`=?', [$id]);
		return back();
	}
	public function updateForm($id)
	{	
		$result = DB::select('SELECT * FROM `project`  WHERE  `id`=?',[$id]);
		
		return view('admin.event.updateEvent')->with('data',$result);
		//return back();
	}
	public function updateEvent(Request $request)
	{	
		$id = $request->input('id');
		$title = $request->input('title');
		$date = $request->input('date');
		$description = $request->input('description');
		DB::insert('UPDATE `project` SET `member_id`=?,`finance_id`=?,`name`=?,`description`=?,`year`=?
		WHERE `id`=?', [1,1, "$title","$description","$date",$id]);
		
		 return redirect('admin/event');
		//return view('admin.event.updateEvent')->with('data',$result);
		//return back();
	}
}
