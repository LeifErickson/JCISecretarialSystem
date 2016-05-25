<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Member;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;

class MembersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // $members = Member::paginate(15);
        $members = Member::paginate(9999999);
			
			DB::insert('UPDATE  `members`
						INNER JOIN  
						(SELECT t1.`id`,IFNULL(t2.participate,0) as participate,(SELECT count(`id`) FROM `events` ) as total 
						FROM 
						(SELECT `members`.`id` FROM `members` ) t1
						LEFT JOIN
						(SELECT `members`.`id`,count(`member_id`) as participate
						FROM `events_attended`, `members`
						WHERE
							`events_attended`.`member_id` = `members`.`id`
						GROUP BY 
						`members`.`id`) t2
						ON t1.`id` = t2.`id`) tableChange
						ON `members`.`id` = tableChange.`id`
						SET `members`.`memberstatus`=?
						WHERE tableChange.participate/tableChange.total < 0.50',['inactive']);
			DB::insert('UPDATE  `members`
						INNER JOIN  
						(SELECT t1.`id`,IFNULL(t2.participate,0) as participate,(SELECT count(`id`) FROM `events` ) as total 
						FROM 
						(SELECT `members`.`id` FROM `members` ) t1
						LEFT JOIN
						(SELECT `members`.`id`,count(`member_id`) as participate
						FROM `events_attended`, `members`
						WHERE
							`events_attended`.`member_id` = `members`.`id`
						GROUP BY 
						`members`.`id`) t2
						ON t1.`id` = t2.`id`) tableChange
						ON `members`.`id` = tableChange.`id`
						SET `members`.`memberstatus`=?
						WHERE tableChange.participate/tableChange.total > 0.50',['active']);

        return view('admin.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['firstname' => 'required', 'lastname' => 'required', 'middlename' => 'required', 'birthdate' => 'required', 'gender' => 'required', ]);

        Member::create($request->all());

        Session::flash('flash_message', 'Member added!');

        return redirect('admin/members');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $member = Member::findOrFail($id);

        return view('admin.members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $member = Member::findOrFail($id);

        return view('admin.members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['firstname' => 'required', 'lastname' => 'required', 'middlename' => 'required', 'birthdate' => 'required', 'gender' => 'required', ]);

        $member = Member::findOrFail($id);
        $member->update($request->all());

        Session::flash('flash_message', 'Member updated!');

        return redirect('admin/members');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        DB::insert('UPDATE  `members` set `memberstatus`=? WHERE `members`.`id` = ?', ['active',$id]);

        Session::flash('flash_message', 'Member updated!');

        return redirect('admin/members');
    }

}
