<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use App\Member;
use Khill\Lavacharts\Lavacharts;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Backend
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */

    public function index()
	{
	//================Members Chart================================
	$membersTable = \Lava::DataTable();  // Lava::DataTable() if using Laravel
    $membersTable->addDateColumn('Day')
    			 ->addNumberColumn('Registered');

    // Data For Member Chart
    
    $registereddate = DB::table("members")
    ->take(120)
    ->orderBy('membersince', 'desc')
	->lists("membersince"); // "=" is optional

    if (count($registereddate) > 120)
    {
        $total = 120;
    }
    else
    {
        $total = count($registereddate);
    }

	for ($i=0; $i < count($registereddate); $i++) 
	{ 
		$members[$i] = DB::table("members")
				 ->select('id')
				 ->where('membersince','=',$registereddate[$i])
				 ->count();
	}

    for ($a = 0; $a < $total; $a++)
    {
        $rowData = [
        	$registereddate[$a],$members[$a]
        ];

        $membersTable->addRow($rowData);
    }

    \Lava::AreaChart(('membersTable'), $membersTable, [
    	'title' => 'Member Registration Chart',
    	'legend' => [
        'position' => 'in'
    	]
	]);



    //====================Projects Chart============================
    $projectsTable = \Lava::DataTable();  // Lava::DataTable() if using Laravel
    $projectsTable->addDateColumn('Day')
    			  ->addNumberColumn('Completed');

    // Data For Projects Chart

    $datecompleted = DB::table("projects")
    ->take(120)
    ->orderBy('datecompleted', 'desc')
	->lists("datecompleted"); // "=" is optional

    if (count($datecompleted) > 120)
    {
        $total = 120;
    }
    else
    {
        $total = count($datecompleted);
    }

	for ($i=0; $i < $total; $i++) 
	{ 
		$projects[$i] = DB::table("projects")
				 ->select('id')
				 ->where('datecompleted','=',$datecompleted[$i])
				 ->count();
	}

    for ($a = 0; $a < $total; $a++)
    {
        $rowData = [
        	$datecompleted[$a],$projects[$a]
        ];

        $projectsTable->addRow($rowData);
    }

    \Lava::LineChart(('projectsTable'), $projectsTable, [
    	'title' => 'Projects Completed Chart',
    	'legend' => [
        'position' => 'in'
    	]
	]);
	
	$NumberoOfEventsAttended = DB::select('
				SELECT t1.`id`,IFNULL(t2.participate,0) as participate
				FROM 
				(SELECT `members`.`id` FROM `members` ) t1
				LEFT JOIN
				(SELECT `members`.`id`,count(`member_id`) as participate
				FROM `events_attended`, `members`
				WHERE
					`events_attended`.`member_id` = `members`.`id`
				GROUP BY 
				`members`.`id`) t2
				ON t1.`id` = t2.`id`
	');

    $test = array('id','eventtype','name','datebegun','datecompleted');

    $dates = DB::table("projects")
    ->take(120)
    ->orderBy('datebegun', 'desc')
    ->lists('datebegun');

    $details = DB::table("projects")
    ->take(120)
    ->orderBy('datebegun', 'desc')
    ->lists('name');

    $type = DB::table("projects")
    ->take(120)
    ->orderBy('datebegun', 'desc')
    ->lists('eventtype');

    $id = DB::table("projects")
    ->take(120)
    ->orderBy('datebegun', 'desc')
    ->lists('id'); // "=" is optional

    $description = DB::table("projects")
    ->take(120)
    ->orderBy('datebegun', 'desc')
    ->lists('description');


    $dates1 = DB::table("meetings")
    ->take(120)
    ->orderBy('dateset', 'desc')
    ->lists('dateset');
    
    $details1 = DB::table("meetings")
    ->take(120)
    ->orderBy('dateset', 'desc')
    ->lists('title');

    $type1 = DB::table("meetings")
    ->take(120)
    ->orderBy('dateset', 'desc')
    ->lists('eventtype');

    $id1 = DB::table("meetings")
    ->take(120)
    ->orderBy('dateset', 'desc')
    ->lists('id'); // "=" is optional

    $description1 = DB::table("meetings")
    ->take(120)
    ->orderBy('dateset', 'desc')
    ->lists('description');


    $dates2 = DB::table("events")
    ->take(120)
    ->orderBy('year', 'desc')
    ->lists('year');
    
    $details2 = DB::table("events")
    ->take(120)
    ->orderBy('year', 'desc')
    ->lists('name');

    $type2 = DB::table("events")
    ->take(120)
    ->orderBy('year', 'desc')
    ->lists('eventtype');

    $id2 = DB::table("events")
    ->take(120)
    ->orderBy('year', 'desc')
    ->lists('id'); // "=" is optional

    $description2 = DB::table("events")
    ->take(120)
    ->orderBy('year', 'desc')
    ->lists('description');

//======================================== Array to JSON =========================================
    for($i=0;$i < count($dates);$i++){
        $event_array[] = array(
            'id' => $id[$i],
            'type' => $type[$i],
            'title' => $details[$i],
            'start' => $dates[$i],
            'description' => $description[$i],
        );
    }
    
   $variable2 = json_encode($event_array);

   $event_array = array();
   for($i=0;$i < count($dates1);$i++){
        $event_array[] = array(
            'id' => $id1[$i],
            'type' => $type1[$i],
            'title' => $details1[$i],
            'start' => $dates1[$i],
            'description' => $description1[$i],
        );
    }

    $variable3 = json_encode($event_array);
    $event_array = array();

    for($i=0;$i < count($dates2);$i++){
        $event_array[] = array(
            'id' => $id2[$i],
            'type' => $type2[$i],
            'title' => $details2[$i],
            'start' => $dates2[$i],
            'description' => $description2[$i],
        );
    }

    $variable4 = json_encode($event_array);
//======================================== Array to JSON END=========================================

//======================================== Add Events to Calendar =====================================

    $allevents = array_merge($dates, $dates1, $dates2);
    // $date = strtotime($allevents[0]);
    // $date = $date - time();
    $date_array[] = array();
    for($i=0;$i < count($allevents);$i++){
        $date = strtotime($allevents[$i]) - time();
            if ($date > 0)
            {
                $date_array[$i] = $date; //Saves to upcoming events array
            }
            // else
            // {
            //     $date = strtotime('+1 day') - strtotime($allevents[$i]) - 86400; //Checks if date is ongoing and has still remaining time 
            //     if ($date > 0)
            //     {
            //          $date_array[$i] = $date;
            //     }
            // }
    };
        sort($date_array);//Sorts upcoming events array then gets the near one
        
        if ($date_array[0] != null) // check if array is not null
        {
            $days_remaining = floor($date_array[0] / 86400);
            $hours_remaining = floor(($date_array[0] % 86400) / 3600);
        }
        else
        {
            $days_remaining = 90;
            $hours_remaining = 90;
        }

//==================================================================================================

//================================dashboard view====================================================
	return view('backend.dashboard')
        ->with('variable2', $variable2)
        ->with('variable3', $variable3)
        ->with('variable4', $variable4)
        ->with('days_remaining',$days_remaining)
        ->with('hours_remaining',$hours_remaining);

	}
}