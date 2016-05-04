<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use DB;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
		  //$resultProjects = DB::select('SELECT * FROM `projects` WHERE `year` between DATE_SUB(curdate(),INTERVAL 30 DAY) and DATE_ADD(curdate(),INTERVAL 30 DAY) ORDER BY `year` DESC');
		  $result = DB::select('SELECT * FROM `events` WHERE `year` between DATE_SUB(curdate(),INTERVAL 30 DAY) and DATE_ADD(curdate(),INTERVAL 30 DAY) ORDER BY `year` DESC');
		  $resultEvents = DB::select('SELECT * FROM `events` WHERE `year` between curdate() and DATE_ADD(curdate(),INTERVAL 30 DAY) ORDER BY `year` DESC');
        return view('frontend.index',['data'=> $result,'upcoming_Events'=>$resultEvents]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }
	 
	  public function eventPost($id)
    {
		  //$resultProjects = DB::select('SELECT * FROM `projects` WHERE `year` between DATE_SUB(curdate(),INTERVAL 30 DAY) and DATE_ADD(curdate(),INTERVAL 30 DAY) ORDER BY `year` DESC');
		  $result = DB::select('SELECT * FROM `events` WHERE `id`=?;',[$id]);
        return view('frontend.post',['data'=> $result]);
    }
	  public function projectPost($id)
    {
		  
		  $result = DB::select('SELECT * FROM `projects` WHERE `id`=?;',[$id]);
        return view('frontend.post',['data'=> $result]);
    }
	public function meetingPost($id)
    {
		  $result = DB::select('SELECT * FROM `meetings` WHERE `id`=?;',[$id]);
        return view('frontend.postMeeting',['data'=> $result]);
    }
}
