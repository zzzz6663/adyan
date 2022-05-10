<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Curt;
use App\Models\Duty;
use App\Models\Plan;
use App\Models\User;
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
        // $curts=Curt::whereType('primary')->where('status','!=','accept')->where('side','0')->whereIn('group_id',$user->groups->pluck('id')->toArray())->get();
        $curts=Curt::whereType('primary')->where(function ($query){$query->where('status','!=','accept')-> orWhere('status',null);})->where('side','0')->whereIn('group_id',$user->groups->pluck('id')->toArray())->get();
        $subjects=Subject::whereStatus(null)->whereIn('group_id',$user->groups->pluck('id')->toArray())->get();
        $plans=Plan::whereType('primary')->where(function ($query){$query->where('status','!=','accept')-> orWhere('status',null);})->where('side','0')->whereIn('group_id',$user->groups->pluck('id')->toArray())->get();

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
        if($request->  close){
            $data['status']='1';
           }
        $session = Session::create($data);
        if(isset($data['users'])){
            $session->users()->attach($data['users']);
        }
        if(isset($data['curts'])){
            $session->curts()->attach($data['curts']);
            $first_curt=Curt::find($data['curts'][0]);
            if($first_curt){
                $session->update(['group_id'=>$first_curt->group->id]);
            }
        }
        if(isset($data['subjects'])){
            $session->subjects()->attach($data['subjects']);
            $first_subject=Subject::find($data['subjects'][0]);
            if($first_subject){
                $session->update(['group_id'=>$first_subject->group->id]);
            }
        }
        if(isset($data['plans'])){
            $session->plans()->attach($data['plans']);
            // $session->plans()->attach($data['plans']);
            $first_plan=Plan::find($data['plans'][0]);
            if($first_plan){
                $session->update(['group_id'=>$first_plan->group->id]);
            }
        }

        foreach ($data['users'] as $key => $val){
            $master=User::find($val);
            $master->save_duty( [],['type'=>'confirm_session','session_id'=>$session->id],true);
        }

        alert()->success(__('alert.a33'));


        return redirect()->route('session.show',$session->id);

    }
    public function update2(Request $request,Session $session)
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


        if(isset($data['curts'])){
            $session->curts()->sync($data['curts']);
            $first_curt=Curt::find($data['curts'][0]);
            if($first_curt){
                $session->update(['group_id'=>$first_curt->group->id]);
            }
        }
        if(isset($data['subjects'])){
            $session->subjects()->sync($data['subjects']);
            $first_subject=Subject::find($data['subjects'][0]);
            if($first_subject){
                $session->update(['group_id'=>$first_subject->group->id]);
            }
        }
        if(isset($data['plans'])){
            $session->plans()->sync($data['plans']);
            // $session->plans()->attach($data['plans']);
            $first_plan=Plan::find($data['plans'][0]);
            if($first_plan){
                $session->update(['group_id'=>$first_plan->group->id]);
            }
        }
        $old_users=$session->users()->pluck('id')->toArray();



        // $result=array_diff($data['users'],$old_users);
        if(count($old_users)>count($data['users'])){
            $result=array_diff($old_users,$data['users']);
        }else{
            $result=array_diff($data['users'],$old_users);
        }

        foreach ($result as $key => $val){
            $duty= Duty::whereType('confirm_session')->where('session_id',$session->id);
            if(  $duty){
             $duty->delete();
            }else{
             $master=User::find($val);
             $master->save_duty( [],['type'=>'confirm_session','session_id'=>$session->id],true);
            }
        }
        if(isset($data['users'])){
            $session->users()->sync($data['users']);
        }
        alert()->success(__('alert.a33'));

        $session ->update($data);

        return redirect()->route('admin.all.session');

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
       $ready_to_close=$request->ready_to_close;
        return view('admin.session.show' ,compact(['session','ready_to_close']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Session $session)
    {

        $group=$request->group??null;
        $plan=$request->plan??null;
        $user=auth()->user();
        // $curts=Curt::whereType('primary')->where('status','!=','accept')->where('side','0')->whereIn('group_id',$user->groups->pluck('id')->toArray())->get();
        // $curts=$session->curts;
        // $subjects=$session->subjects;
        // $plans=$session->plans;
        $curts=Curt::whereType('primary')->where(function ($query){$query->where('status','!=','accept')-> orWhere('status',null);})->where('side','0')->whereIn('group_id',$user->groups->pluck('id')->toArray())->get();
        $subjects=Subject::whereStatus(null)->whereIn('group_id',$user->groups->pluck('id')->toArray())->get();
        $plans=Plan::whereType('primary')->where(function ($query){$query->where('status','!=','accept')-> orWhere('status',null);})->where('side','0')->whereIn('group_id',$user->groups->pluck('id')->toArray())->get();


        // $curts=Curt::whereType('primary')->where('status','!=','accept')->where('side','0')->whereIn('group_id',$user->groups->pluck('id')->toArray())->get();
        // $subjects=Subject::whereStatus(null)->whereIn('group_id',$user->groups->pluck('id')->toArray())->get();
        // $plans=Plan::whereType('primary')->where('status','!=','accept')->where('side','0')->whereIn('group_id',$user->groups->pluck('id')->toArray())->get();

        return view('admin.session.edit',compact(['user','curts','subjects','group','plans','session']));

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
       if($request->  close){
        $data['status']='1';
       }
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
    public function all_session()
    {
        $user= auth()->user();
        $sessions=$user->sessions()->latest()->get();
        if($user->level=='expert'){
                $sessions=Session::latest()->get();
        }
    return view('admin.session.all_session',compact(['user','sessions']));
    }
    public function session_confirm(Request $request,Session $session)
    {
        $user= auth()->user();
        $duty= $user->duties()->where('session_id',$session->id)->whereType('confirm_session')->first();
        $duty->update([
            'time'=>Carbon::now()
        ]);
        $confirm=0;
        if($request->confirm){
            $confirm=1;
        }
        $user->sessions()->updateExistingPivot($session->id, array('time' => Carbon::now(),'confirm'=>$confirm,'info'=>$request->info), false);
        alert()->success(__('alert.a54'));
      return redirect()->route('user.note');

    }
    public function session_confirm_show(Session $session)
    {
        $user= auth()->user();
$hide_note=true;
    return view('admin.session.confirm_show',compact(['user','session','hide_note']));
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
    public function result(Request $request ,Session $session){
        return view('admin.session.result' ,compact(['session']));
    }
}
