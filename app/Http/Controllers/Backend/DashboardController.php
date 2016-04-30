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

    $calendar = DB::table("projects")
    ->take(120)
    ->select('datebegun')
    ->orderBy('datebegun', 'desc')
    ->lists("datebegun"); // "=" is optional

    $event_array = array();

    $result->setFetchMode(PDO::FETCH_ASSOC);
    while ($record = $result->fetch()) {
        $event_array[] = array(
            'id' => $record['event_id'],
            'title' => $record['event_name'],
            'start' => $record['start_event'],
            'end' => $record['end_event'],
        );
    }



    //dashboard view
	return view('backend.dashboard');

	}
}