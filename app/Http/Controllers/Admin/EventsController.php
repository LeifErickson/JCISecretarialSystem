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
		$result = DB::table('events')->orderBy('year', 'desc')->get();
		return view('admin.event.index')->with('data',$result);
	}
	public function addEventForm()
	{
		return view('admin.event.addEvent');
	}
	
	 public function store(Request $request)
    {
		$title = $request->input('title');
		$description = $request->input('description');
		$date = $request->input('date');
		$Sponsors = $request->input('sponsors');
		DB::insert('INSERT INTO `events`(`user_id`,`name`, `description`,`year`) 
		VALUES (?,?,?,?)', [1,"$title","$description","$date"]);
		
		
		$result = DB::select('SELECT max(`id`) as id FROM `events`');
		$id = 0;
		foreach($result as $lastInsert){
			$id = $lastInsert->id;
		}
		 //"hello";
		$split = explode("\n", $Sponsors);
		$num = 0;
		for($i=0;$i < count($split)-1;$i++){
			$str = explode(",", $split[$i]);
			DB::insert('INSERT INTO `finances` (`member_id`, `event_id`, `amount` )
			VALUES (?,?,?)', [$str[0],$id,$str[1]]);
		}
		
		return redirect('admin/events');
    }
	public function delete($id)
	{
		DB::insert('DELETE FROM `events` WHERE `id`=?', [$id]);
		return back();
	}
	public function updateForm($id)
	{	
		$result = DB::select('SELECT * FROM `events`  WHERE  `id`=?',[$id]);
		$finance = DB::select('SELECT `members`.`id`,`firstname`,`lastname`,`amount` FROM `finances`,`members` WHERE `member_id` = `members`.`id`
					AND `event_id` = ?',[$id]);
		
		
		return view('admin.event.updateEvent', ['data' => $result,'finance'=> $finance]);
	}
	public function updateEvent(Request $request)
	{	
		$id = $request->input('id');
		$title = $request->input('title');
		$description = $request->input('description');
		$date = $request->input('date');
		$Sponsors = $request->input('sponsors');
		
		DB::insert('UPDATE `events` SET `name`=?,`description`=?, `year`=?
		WHERE `id`=?', ["$title","$description","$date ",$id]);
		
		DB::insert('DELETE FROM `finances` WHERE `event_id`=?', [$id]);
		$split = explode("\n", $Sponsors);
		$num = 0;
		for($i=0;$i < count($split)-1;$i++){
			$str = explode(",", $split[$i]);
			DB::insert('INSERT INTO `finances` (`member_id`, `event_id`, `amount` )
			VALUES (?,?,?)', [$str[0],$id,$str[1]]);
		}
		 return redirect('admin/events');
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
		}
		
		echo $response;
	}
}
