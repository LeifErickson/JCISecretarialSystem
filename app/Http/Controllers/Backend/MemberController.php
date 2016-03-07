<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Member;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
       /**
    * Display a listing of the resource.
    *
    * @return Response
    */
   public function index()
   {
      	$members=Member::all();
        return view('members.layouts.index',compact('members'));
        //return view('backend.members');

   }

   public function home()
   {
        return view('backend.members');

   }
   /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
   public function create()
   {
      return view('members.layouts.create');
   }
   /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
   public function store(Request $request)
   {
      $member=$request->all();

      $member['birthdate'] = \Carbon\Carbon::parse($member['birthdate'])->format("Y-m-d");
      $member['dateofinduction'] = \Carbon\Carbon::parse($member['dateofinduction'])->format("Y-m-d");
	  Member::create($member);
	  //dd($member);
	  return redirect('members');
   }
   /**
    * Display the specified resource.
    *	
    * @param  int  $id
    * @return Response
    */
   public function show($id)
   {
      $members=Member::find($id);
      return view('members.layouts.view',compact('members'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
   public function edit($id)
   {
   		$members=Member::find($id);
		return view('members.layouts.edit',compact('members'));
   }
   /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
   public function update(Request $request, $id)
   {
	   $membersUpdate=$request->all();
	   $member=Member::find($id);
	   $member['birthdate'] = \Carbon\Carbon::parse($member['birthdate'])->format("Y-m-d");
       $member['dateofinduction'] = \Carbon\Carbon::parse($member['dateofinduction'])->format("Y-m-d");
	   $member->update($membersUpdate);
	   return redirect('members');
   }
   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
   public function destroy($id)
   {
     Member::find($id)->delete();
   	 return redirect('members');
   }
}
