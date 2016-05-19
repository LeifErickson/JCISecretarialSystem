<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Project as Project;
use Illuminate\Http\Request;
use DB;
use DateTime;

class AttendanceMonitoringController extends Controller
{
	public function index($id)
	{	
		if($id == 0){
			$events = DB::select('SELECT `id`,`name` FROM `events`');
			
			$event_id = 0;
			foreach($events as $row){
				$event_id = $row->id;
			}

			$events = DB::select('SELECT `id`,`name` FROM `events`');

			$eventTitle = DB::select('SELECT `id`,`name` FROM `events` WHERE `id`=?',[$event_id]);
			
			$attendance = DB::select("SELECT t1.`id`,t1.`firstname`, t1.`lastname`,IFNULL(t2.Present,0) as Present 	FROM
			(SELECT `members`.`id`,`firstname`, `lastname` FROM `members`) t1
			LEFT JOIN 
			(SELECT `members`.`id`,count(`members`.`id`) as Present
			FROM `events_attended`,`members`
			WHERE 
			`events_attended`.`member_id` = `members`.`id` AND
			`events_attended`.`event_id` = ?
			GROUP BY `members`.`id`
			) t2
			ON
			t1.`id` = t2.`id`",[$event_id]);
			return view('admin.attendanceMonitoring.index',['events' => $events, 'attendance'=> $attendance,'title'=>$eventTitle]);
		} else {
			$events = DB::select('SELECT `id`,`name` FROM `events`');
			
			$default = DB::select('SELECT `name` FROM `events` WHERE `id`=?',[$id]);
			
			$attendance = DB::select("SELECT t1.`id`,t1.`firstname`, t1.`lastname`,IFNULL(t2.Present,0) as Present 	FROM
			(SELECT `members`.`id`,`firstname`, `lastname` FROM `members`) t1
			LEFT JOIN 
			(SELECT `members`.`id`,count(`members`.`id`) as Present
			FROM `events_attended`,`members`
			WHERE 
			`events_attended`.`member_id` = `members`.`id` AND
			`events_attended`.`event_id` = ?
			GROUP BY `members`.`id`
			) t2
			ON
			t1.`id` = t2.`id`",[$id]);
			return view('admin.attendanceMonitoring.index',['events' => $events, 'attendance'=> $attendance,'title'=>$default]);
		}
		
	}
	
	
	function filter($id){
		$attendance = DB::select("
			SELECT `members`.`id`,`firstname`, `lastname`,count(`members`.`id`) as Present
			FROM `events_attended`,`members`
			WHERE 
			`events_attended`.`member_id` = `members`.`id` AND
			`events_attended`.`event_id` = ? 
			GROUP BY `members`.`id`
		",[$event_id]);
	
		/*
			SELECT `members`.`id`,`firstname`, `lastname`
			FROM `members`
WHERE NOT EXISTS(SELECT `events_attended`.`member_id` FROM `events_attended` WHERE `events_attended`.`event_id` = 1)
			WHERE 
			NOT EXISTS(SELECT `events_attended`.`member_id` FROM `events_attended` WHERE `events_attended`.`event_id` = 1)
			
			
			*/
	}
	
}
