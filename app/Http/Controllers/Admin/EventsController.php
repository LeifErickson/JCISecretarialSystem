<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Project as Project;
use Illuminate\Http\Request;
use DB;
use DateTime;

class EventsController extends Controller
{
	public function index()
	{
		//$proj = new Project();
		
		//$result = $proj->orderBy('year', 'desc')->paginate(5);
		$result = DB::table('events')->orderBy('year', 'desc')->get();
		return view('admin.event.index')->with('data',$result);
	}
	public function addEventForm()
	{
		return view('admin.event.addEvent');
	}
	
	 public function store(Request $request)
    {
		$now = date('Y-m-d');
		$title = $request->input('title');
		$description = $request->input('description');
		DB::insert('INSERT INTO `events`(`user_id`,`name`, `description`,`year`) 
		VALUES (?,?,?,?)', [1,"$title","$description"],$now);
		
		  return redirect('admin/events');
    }
	public function delete($id)
	{
		DB::insert('DELETE FROM `projects` WHERE `id`=?', [$id]);
		return back();
	}
	public function updateForm($id)
	{	
		$result = DB::select('SELECT * FROM `projects`  WHERE  `id`=?',[$id]);
		
		return view('admin.event.updateEvent')->with('data',$result);
	}
	public function updateEvent(Request $request)
	{	
		$now = date('Y-m-d');
		$id = $request->input('id');
		$title = $request->input('title');
		$date = $request->input('date');
		$description = $request->input('description');
		DB::insert('UPDATE `project` SET `name`=?,`description`=?
		WHERE `id`=?', ["$title","$description",$id],$now);
		
		 return redirect('admin/event');
	}
	
	public function search($name)
	{	
		$hint="";
		
		$result = DB::select("SELECT `id`,`firstname`,`lastname`,`middlename`  
		FROM `members`  WHERE  
		`firstname` LIKE '%$name%' OR `lastname` LIKE '%$name%' OR `middlename` LIKE '%$name% '");
		
		foreach($result as $row){
				$name = $row->firstname." ".$row->lastname;
				$hint .= "<button  class='btn btn-default btn-block' onclick='setVal(".$row->id.",\"".$name."\")'  >".$name."</button>";
				//$hint++;
		}
		
		if ($hint=="") {
		  $response="no suggestion";
		} else {
		 $response= "<div style='border:1px solid;'>".$hint."</div>";
		 //$response = $hint;
		}
		
		echo $response;
	}
}
