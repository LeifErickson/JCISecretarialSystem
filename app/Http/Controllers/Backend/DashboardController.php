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
    $total = 120;

    $registereddate = DB::table("members")
    ->take(120)
    ->orderBy('membersince', 'desc')
	->lists("membersince"); // "=" is optional

	for ($i=0; $i < $total; $i++) 
	{ 
		$members[$i] = DB::table("members")
				 ->select('id')
				 ->where('membersince','=',$registereddate[$i])
				 ->count();
	}

    for ($a = 0; $a < $total; $a++)
    {
        $rowData = [
          // "2014-8-$a", rand(800,1000), rand(800,1000)
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

    // Data For Member Chart
    $total = 120;

    $datecompleted = DB::table("projects")
    ->take(120)
    ->orderBy('datecompleted', 'desc')
	->lists("datecompleted"); // "=" is optional

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
          // "2014-8-$a", rand(800,1000), rand(800,1000)
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

    for($i=0;$i < count($dates);$i++){
        $event_array[] = array(
            'id' => $id[$i],
            'type' => $type[$i],
            'title' => $details[$i],
            'start' => $dates[$i],
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
        );
    }
    $variable3 = json_encode($event_array);

    //dashboard view
	return view('backend.dashboard')
        ->with('variable2', $variable2)
        ->with('variable3', $variable3);

	}
}