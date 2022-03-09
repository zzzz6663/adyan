<?php

namespace App\Http\Controllers\admin;

use NumberFormatter;
use App\Models\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Curt;

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
    public function create()
    {
        $user=auth()->user();
        $curts=Curt::whereType('primary')->where('status','!=','accept')->where('side','0')->whereIn('group_id',$user->groups->pluck('id')->toArray())->get();
        return view('admin.session.create',compact(['user','curts']));
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
            'curts' => 'required',
            'time' => 'required',
        ]);
        $data['time']=$this->convert_date($data['time']);
        $data['user_id']=auth()->user()->id;
        $session = Session::create($data);
        $session->users()->attach($data['users']);
        $session->curts()->attach($data['curts']);

        alert()->success(__('alert.a33'));


        return redirect()->route('admin.show.curt',[$data['curts'][0],'session'=>$session->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,)
    {
        return view('admin.session.edit' ,compact(['session']));
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
    public function update(Request $request, $id)
    {
        //
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
