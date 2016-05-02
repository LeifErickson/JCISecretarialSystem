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

    // $calendar = DB::table("projects")
    // ->take(120)
    // ->select('id','eventtype','name','datebegun','datecompleted')
    // ->orderBy('datebegun', 'desc')
    // ->lists(); // "=" is optional

    // $event_array = array();

    // for($i=0;$i < 120;$i++){
    //     $event_array[] = array(
    //         'id' => $calendar[$i,0,0,0,0],
    //         'eventtype' => $calendar[0,$i,0,0,0],
    //         'name' => $calendar[0,0,$i,0,0],
    //         'start' => $calendar[0,0,0,$i,0],
    //         'end' => $calendar[0,0,0,0,$i],
    //     );
    // }

    //dashboard view
	return view('backend.dashboard');

	}
}