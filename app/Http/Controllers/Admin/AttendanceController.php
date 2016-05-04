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

	public function eventsAttendance($id)
	{			
		
		$result = DB::select('SELECT `events_attended`.`member_id`,`firstname`, `lastname`, `middlename`,`status`,`events_attended`.`year`
					FROM `events_attended`,`members`  WHERE 
					`events_attended`.`event_id` = ? AND 
					`members`.`id` = `events_attended`.`member_id`',[$id]);
		
		$info = DB::select('SELECT * FROM `events`  WHERE  `id`=?',[$id]);
		$sponsors = DB::select('SELECT `name`, `donation` FROM `finances` WHERE   `event_id`=?',[$id]);
		
		
		return view('admin.attendance.index', ['sponsors' => $sponsors,'data' => $result, 'info' => $info, 'data_id'=> $id]);
	}
	public function projectsAttendance($id)
	{			
		
		$result = DB::select('SELECT `projects_attended`.`member_id`,`firstname`, `lastname`, `middlename`,`status`,`projects_attended`.`year`
					FROM `projects_attended`,`members`  WHERE 
					`projects_attended`.`project_id` = ? AND 
					`members`.`id` = `projects_attended`.`member_id`',[$id]);
		
		$info = DB::select('SELECT * FROM `projects`  WHERE  `id`=?',[$id]);
		
		
		return view('admin.attendance.indexProject', ['data' => $result, 'info' => $info, 'data_id'=> $id]);
	}
	public function meetingAttendance($id)
	{			
		
		$result = DB::select('SELECT `meetings_attended`.`member_id`,`firstname`, `lastname`, `middlename`,`status`,`meetings_attended`.`year`
					FROM `meetings_attended`,`members`  WHERE 
					`meetings_attended`.`meeting_id` = ? AND 
					`members`.`id` = `meetings_attended`.`member_id`',[$id]);
		
		$info = DB::select('SELECT * FROM `meetings`  WHERE  `id`=?',[$id]);
		
		
		return view('admin.attendance.indexMeeting', ['data' => $result, 'info' => $info, 'data_id'=> $id]);
	}
	

	//-----------------EVENTS ATTENDANCE-----------------//
	 public function storeEvents($project_id,$member_id)
    {
		$now = new DateTime();
		DB::insert('INSERT INTO `events_attended`(`member_id`, `event_id`, `year`) 
		VALUES (?,?,?)', [$member_id, $project_id,$now]);
		
		return redirect('admin/attendance/eventsAttendance/'.$project_id);
    }
	 
	public function deleteEvents($id)
	{
		DB::table('events_attended')->where('member_id','=', $id)->delete();
		return back();
		
	}
	public function searchEvents($project_id,$name)
	{	
		$hint="";
		
		$result = DB::select("SELECT `id`,`firstname`,`lastname`,`middlename`  
		FROM `members` WHERE   
		NOT EXISTS(SELECT `member_id` FROM `events_attended` WHERE `member_id` = `members`.`id`) AND
		(`firstname` LIKE '%$name%' OR `lastname` LIKE '%$name%' OR `middlename` LIKE '%$name% ')");
		
		foreach($result as $row){
				$hint .= "<a  style='cursor:pointer;' href='../addattendance/".$project_id."/".$row->id."'>".$row->firstname." ".$row->lastname."</a><br>";
		}
		
		if ($hint=="") {
		  $response="no suggestion";
		} else {
		  $response= "<div style='border:1px solid;'>".$hint."</div>";
		  //$response= $hint;
		}
		
		echo $response;
	}
	
	//-----------------MEETING ATTENDANCE-----------------//
	 public function storeMeeting($project_id,$member_id)
    {
		$now = new DateTime();
		DB::insert('INSERT INTO `meetings_attended`(`member_id`, `meeting_id`, `year`) 
		VALUES (?,?,?)', [$member_id, $project_id,$now]);
		
		return redirect('admin/attendance/meetingAttendance/'.$project_id);
    }
	 
	public function searchMeeting($project_id,$name)
	{	
		$hint="";
		
		$result = DB::select("SELECT `id`,`firstname`,`lastname`,`middlename`  
		FROM `members` WHERE   
		NOT EXISTS(SELECT `member_id` FROM `meetings_attended` WHERE `member_id` = `members`.`id`) AND
		(`firstname` LIKE '%$name%' OR `lastname` LIKE '%$name%' OR `middlename` LIKE '%$name% ')");
		
		foreach($result as $row){
				$hint .= "<a  style='cursor:pointer;' href='../addattendanceMeeting/".$project_id."/".$row->id."'>".$row->firstname." ".$row->lastname."</a><br>";
		}
		
		if ($hint=="") {
		  $response="no suggestion";
		} else {
		  $response= "<div style='border:1px solid;'>".$hint."</div>";
		  //$response= $hint;
		}
		
		echo $response;
	}
	
	public function deleteMeeting($id)
	{
		DB::table('meetings_attended')->where('member_id','=', $id)->delete();
		return back();
		
	}
	//-----------------PROJECT ATTENDANCE-----------------//
	 public function storeProjects($project_id,$member_id)
    {
		$now = new DateTime();
		DB::insert('INSERT INTO `projects_attended`(`member_id`, `project_id`, `year`) 
		VALUES (?,?,?)', [$member_id, $project_id,$now]);
		
		return redirect('admin/attendance/projectsAttendance/'.$project_id);
    }
	
	public function searchProject($project_id,$name)
	{	
		$hint="";
		
		$result = DB::select("SELECT `id`,`firstname`,`lastname`,`middlename`  
		FROM `members` WHERE   
		NOT EXISTS(SELECT `member_id` FROM `projects_attended` WHERE `member_id` = `members`.`id`) AND
		(`firstname` LIKE '%$name%' OR `lastname` LIKE '%$name%' OR `middlename` LIKE '%$name% ')");
		
		foreach($result as $row){
				$hint .= "<a  style='cursor:pointer;' href='../addattendanceProject/".$project_id."/".$row->id."'>".$row->firstname." ".$row->lastname."</a><br>";
		}
		
		if ($hint=="") {
		  $response="no suggestion";
		} else {
		  $response= "<div style='border:1px solid;'>".$hint."</div>";
		  //$response= $hint;
		}
		
		echo $response;
	}
	
	public function deleteProject($id)
	{
		DB::table('projects_attended')->where('member_id','=', $id)->delete();
		return back();
		
	}
}
