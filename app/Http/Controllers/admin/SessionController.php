<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Curt;
use App\Models\Plan;
use NumberFormatter;
use App\Models\Session;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sessions=Session::query();
        if ($request->search){
            $search=$request->search;
            $sessions->where('name','LIKE',"%{$search}%");
        }
        $sessions=  $sessions->latest()->paginate(10);
        return view('admin.session.all',compact(['sessions']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @returen \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $group=$request->group??null;
        $plan=$request->plan??null;
        $user=auth()->user();
        $curts=Curt::whereType('primary')->where('status','!=','accept')->where('side','0')->whereIn('group_id',$user->groups->pluck('id')->toArray())->get();
        $subjects=Subject::whereStatus(null)->get();
        $plans=Plan::whereType('primary')->where('status','!=','accept')->where('side','0')->whereIn('group_id',$user->groups->pluck('id')->toArray())->get();

        return view('admin.session.create',compact(['user','curts','subjects','group','plans']));
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
            'name' => 'required',
            'users' => 'required',
            'curts' => 'required_without_all:subjects,plans',
            'subjects' => 'required_without_all:curts,plans',
            'plans' => 'required_without_all:curts,subjects',
            'time' => 'required',
            'group_id' => 'nullable',
        ]);
        $data['time']=$this->convert_date($data['time']);
        $data['user_id']=auth()->user()->id;
        $session = Session::create($data);
        $session->users()->attach($data['users']);
        if(isset($data['curts'])){
            $session->curts()->attach($data['curts']);
        }
        if(isset($data['subjects'])){
            $session->subjects()->attach($data['subjects']);
        }
        if(isset($data['plans'])){
            $session->plans()->attach($data['plans']);
        }

        alert()->success(__('alert.a33'));


        return redirect()->route('session.show',$session->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Session $session)
    {
        session()->forget('session',$session->id);
       session()->put('session',$session->id);
        return view('admin.session.show' ,compact(['session']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
       $data=$request->validate(['info'=>'nullable']);
       $data['time']=Carbon::now();
       $session->update($data);
       alert()->success(__('alert.a38'));

        return redirect()->route('user.note');

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
    public function convert_date( $from){
        $date=explode('-',$from);
        $fmt = numfmt_create('fa', NumberFormatter::DECIMAL);
        $year= numfmt_parse($fmt, $date[0])  ;
        $month= numfmt_parse($fmt, $date[1])  ;
        $day= numfmt_parse($fmt, $date[2])  ;
        $from=  \Morilog\Jalali\CalendarUtils::toGregorian($year, $month, $day);
        return   $from=$from[0].'-'.$from[1].'-'.$from[2].' 00:00:00';
    }
}
