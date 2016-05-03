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
		$type = array('event');
		$result = DB::select('SELECT `events_attended`.`type`,`events_attended`.`member_id`,`firstname`, `lastname`, `middlename`,`status`,`events_attended`.`year`
					FROM `events_attended`,`members`  WHERE 
					`events_attended`.`event_id` = ? AND 
					`events_attended`.`type`= ? AND 
					`members`.`id` = `events_attended`.`member_id`',[$id,$type[0]]);
		
		$info = DB::select('SELECT * FROM `events`  WHERE  `id`=?',[$id]);
		$sponsors = DB::select('SELECT `firstname`, `lastname` FROM `finances`,`members`  WHERE  `members`.`id` = `member_id` AND `event_id`=?',[$id]);
		
		
		return view('admin.attendance.index', ['sponsors' => $sponsors,'data' => $result, 'info' => $info, 'data_id'=> $id, 'type'=> $type]);
	}
	
	public function meetingAttendance($id)
	{			
		$result = DB::select('SELECT `events_attended`.`member_id`,`firstname`, `lastname`, `middlename`,`status`,`events_attended`.`year`
					FROM `events_attended`,`members`  WHERE 
					`events_attended`.`event_id` = ? AND 
					`events_attended`.`type` = ? AND
					`members`.`id` = `events_attended`.`member_id`',[$id,'meeting']);
		
		$info = DB::select('SELECT * FROM `events`  WHERE  `id`=?',[$id]);
		$sponsors = DB::select('SELECT `firstname`, `lastname` FROM `finances`,`members`  WHERE  `members`.`id` = `member_id` AND `event_id`=?',[$id]);
		$members = DB::select('SELECT `members`.`id`,`firstname`,`lastname`,`middlename` 
										FROM `members` 
										WHERE 
											NOT EXISTS (SELECT `events_attended`.`id` FROM `events_attended`
																  WHERE `events_attended`.`event_id` = ? AND
											 `members`.`id` = `events_attended`.`member_id` ); ',[$id]);
		
		return view('admin.attendance.index', ['sponsors' => $sponsors,'data' => $result, 'info' => $info, 'data_id'=> $id,'mems'=> $members]);
	}
	

	
	 public function store($project_id,$member_id,$type)
    {
		$now = new DateTime();
		DB::insert('INSERT INTO `events_attended`(`member_id`, `event_id`, `year`,`type`) 
		VALUES (?,?,?,?)', [$member_id, $project_id,$now,$type]);
		
		return redirect('../'.$project_id);
    }
	 
	public function delete($id)
	{
		DB::table('events_attended')->where('member_id','=', $id)->delete();
		return back();
		
	}
	public function search($project_id,$name,$type)
	{	
		$hint="";
		
		$result = DB::select("SELECT `id`,`firstname`,`lastname`,`middlename`  
		FROM `members`  WHERE  
		`firstname` LIKE '%$name%' OR `lastname` LIKE '%$name%' OR `middlename` LIKE '%$name% '");
		
		foreach($result as $row){
				$hint .= "<a  style='cursor:pointer;' href='addattendance/".$project_id."/".$row->id."/".$type."'>".$row->firstname." ".$row->lastname."</a><br>";
				//$hint++;
		}
		
		if ($hint=="") {
		  $response="no suggestion";
		} else {
		  //$response= "<div style='border:1px solid;'>".$hint."</div>";
		  $response= $hint;
		}
		
		echo $response;
	}

}
