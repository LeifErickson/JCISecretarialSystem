<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Project as Project;
use Illuminate\Http\Request;
use DB;
use DateTime;

class ProjectAttendanceController extends Controller
{
	public function index($id)
	{			
		$result = DB::select('SELECT `projects_attended`.`member_id`,`firstname`, `lastname`, `middlename`,`status`,`projects_attended`.`year`
					FROM `projects_attended`,`members`  WHERE 
					`projects_attended`.`project_id` = ? AND 
					`members`.`id` = `projects_attended`.`member_id`',[$id]);
		
		$info = DB::select('SELECT * FROM `events`  WHERE  `id`=?',[$id]);
		$sponsors = DB::select('SELECT `firstname`, `lastname` FROM `finances`,`members`  WHERE  `members`.`id` = `member_id` AND `project_id`=?',[$id]);
		$members = DB::select('SELECT `members`.`id`,`firstname`,`lastname`,`middlename` 
										FROM `members` 
										WHERE 
											NOT EXISTS (SELECT `projects_attended`.`id` FROM `projects_attended`
																  WHERE `projects_attended`.`project_id` = ? AND
											 `members`.`id` = `projects_attended`.`member_id` ); ',[$id]);
		
		return view('admin.attendance.index', ['sponsors' => $sponsors,'data' => $result, 'info' => $info, 'data_id'=> $id,'mems'=> $members]);
	}
	
	 public function store($project_id,$member_id)
    {
		$now = new DateTime();
		DB::insert('INSERT INTO `projects_attended`(`member_id`, `project_id`, `year`) 
		VALUES (?,?,?)', [$member_id, $project_id,$now]);
		return redirect('admin/attendance/'.$project_id);
    }
	public function delete($id)
	{
		DB::table('projects_attended')->where('member_id','=', $id)->delete();
		return back();
		
	}
	public function search($project_id,$name)
	{	
		$hint="";
		
		$result = DB::select("SELECT `id`,`firstname`,`lastname`,`middlename`  
		FROM `members`  WHERE  
		`firstname` LIKE '%$name%' OR `lastname` LIKE '%$name%' OR `middlename` LIKE '%$name% '");
		
		foreach($result as $row){
				$hint .= "<a href='addattendance/".$project_id."/".$row->id."'>".$row->firstname." ".$row->lastname."</a></br>";
				//$hint++;
		}
		
		if ($hint=="") {
		  $response="no suggestion";
		} else {
		  $response= "<div style='border:1px solid;'>".$hint."</div>";
		}
		
		echo $response;
	}

}
