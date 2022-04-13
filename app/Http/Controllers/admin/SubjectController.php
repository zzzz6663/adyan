<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Group;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Session;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user=auth()->user();
        $subjects=Subject::query();
        if ($request->search){
            $search=$request->search;
            $subjects->where('name','LIKE',"%{$search}%");
        }
       if($user->level== 'master'){
        $subjects=  $subjects->where('master_id',$user->id)->orWhere('old_master_id',$user->id)->latest()->paginate(10);
       }else{
        $subjects=  $subjects->latest()->paginate(10);

       }
        return view('admin.subject.all',compact(['subjects']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:256',
            'group_id' => 'required',
            'info' => 'required',
            'tags' => 'required|array|between:1,6',
        ]);
        $user=auth()->user();
        $group=Group::find($data['group_id']);
        $admin=$group->admin();
        $data['master_id']= $user->id;
        $data['old_master_id']= $user->id;
        $data['admin_id']= $admin->id;
        $subject = Subject::create($data);
        $subject->tags()->attach($data['tags']);
        $user->save_log(['admin','list'=>[$group->id]],

        [
            'type' => 'create_subject',
            'subject_id' =>$subject->id,
            'group_id' =>$group->id,
        ]
        , true);
        $admin->save_duty([],
        [
            'type' => 'verify_subject',
            'subject_id' =>$subject->id,
            'group_id' =>$group->id,
        ]

        , true);

        alert()->success(__('alert.a36'));
        return redirect()->route('subject.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
     return view('admin.subject.edit',compact(['subject']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $session= session()->get('session');
        $data = $request->validate([
            'title' => 'required|max:256',
            'master_id' => 'required',
            'info' => 'required',
            'tags' => 'required|array|between:1,6',
            'status' => 'required|max:256',
            'reason' => 'required_if:status,=,0|max:1500',

        ]);








        $data['time']=Carbon::now();
        $subject->update($data);
        $subject->tags()->sync($data['tags']);
        if( $subject->duty){
            $subject->duty->update(['time'=>Carbon::now()]);

        }
        $group=   $subject->group;
        $subject->master->save_log( ['admin'] ,
        [
            'type' => 'subject_result',
            'subject_id' => $subject->id,
            'group_id' =>$group->id
        ], true);
        alert()->success(__('alert.a37'));
        if($session){
            $session=Session::find($session);
            return  redirect()->route('session.show',$session->id);
        }
        return  redirect()->route('session.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
