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
        javascript()->put([
            'test' => 'it works!',
        ]);
		  
		  
		  $result = DB::select('SELECT * FROM `events` WHERE `year` between DATE_SUB(curdate(),INTERVAL 30 DAY) and DATE_ADD(curdate(),INTERVAL 30 DAY) ORDER BY `year` DESC');
        return view('frontend.index',['data'=> $result]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }
}
