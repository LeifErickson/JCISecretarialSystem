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
	public function index($id)
	{			
		$result = DB::select('SELECT `events_attended`.`member_id`,`firstname`, `lastname`, `middlename`,`status`,`events_attended`.`year`
					FROM `events_attended`,`members`  WHERE 
					`events_attended`.`project_id` = ? AND 
					`members`.`id` = `events_attended`.`member_id`',[$id]);
		
		$info = DB::select('SELECT * FROM `project`  WHERE  `id`=?',[$id]);
		
		$members = DB::select('SELECT `members`.`id`,`firstname`,`lastname`,`middlename` 
										FROM `members` 
										WHERE 
											NOT EXISTS (SELECT `events_attended`.`id` FROM `events_attended`
																  WHERE `events_attended`.`project_id` = ? AND
											 `members`.`id` = `events_attended`.`member_id` ); ',[$id]);
		
		return view('admin.attendance.index', ['data' => $result, 'info' => $info, 'data_id'=> $id,'mems'=> $members]);
	}
	
	 public function store($project_id,$member_id)
    {
		$now = new DateTime();
		DB::insert('INSERT INTO `events_attended`(`member_id`, `project_id`, `year`) 
		VALUES (?,?,?)', [$member_id, $project_id,$now]);
		return redirect('admin/attendance/'.$project_id);
    }
	public function delete($id)
	{
		DB::table('events_attended')->where('member_id','=', $id)->delete();
		//DB::insert('DELETE FROM `project` WHERE `id`=?', [$id]);
		return back();
		
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
