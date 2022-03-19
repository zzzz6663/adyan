<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $plans=Plan::query();
        if ($request->search){
            $search=$request->search;
            $plans->where('name','LIKE',"%{$search}%");
        }
        $plans=  $plans->latest()->paginate(10);
        return view('plan.all',compact(['plans']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=auth()->user();
        if($user->plan()->whereType('primary')->count()>0){
            alert()->error(__('alert.a1'));
            return back();
        }
        return view('plan.create',compact(['user']));
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
            'title' => 'required',
            'tags' => 'required',
            'en_title' => 'required',
            'en_tags' => 'required',
            'necessity' => 'required',
            'problem' => 'required',
            'question' => 'required',
            'sub_question' => 'required',
            'hypo' => 'required',
            'theory' => 'required',
            'structure' => 'required',
            'method' => 'required',
            'source' => 'required',
        ]);

        $user=auth()->user();
        if($user->curt()->subject){
           // اگر موضوع طرح اجمالی انتخابی بود
           $data['group_id']=$user->curt()->subject->group->id;
           $data['master_id']=$user->curt()->subject->master_id;
        }


        $data['tags']=implode('_',$data['tags']);
        $data['en_tags']=implode('_',$data['en_tags']);

        $data['status']='review_plan_by_group';
        $data['user_id']=$user->id;
        $data['type']='primary';
        $data['side']='0';
        $plan = Plan::create($data);

        $user->update([
            'status'=>'plan'
        ]);


        // ثبت لاگ
        $duty=$user->duties()->whereType('submit_plan')->first();
        if($duty){
            $duty->update([
                'time'=>Carbon::now(),
                'operator_id'=> $user->id
            ]);
        }

        if($user->curt()->subject){
               // ارسال گزارش برای استاد راهنما و ادمین گروه
        $user->save_log(['expert','admin','list'=>[$user->curt()->subject->group->admin()->id,   $data['master_id']]],
            [
                'type'=>'submit_plan',
                'plan_id'=>$plan->id,
            ],true);
        $user->curt()->subject->group->admin()->save_duty( ['list'=>[$user->curt()->subject->group->admin()->id]],['type'=>'verify_plan','plan_id'=>$plan->id],false);
        }



        alert()->success(__('alert.a2'));
        return redirect()->route('user.note');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        $user=auth()->user();
        $all_plans = $plan->user->plans()->whereType('secondary')->latest()->get();
        return view('plan.edit',compact(['plan','all_plans','user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {

        $data = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'en_title' => 'required',
            'en_tags' => 'required',
            'necessity' => 'required',
            'problem' => 'required',
            'question' => 'required',
            'sub_question' => 'required',
            'hypo' => 'required',
            'theory' => 'required',
            'structure' => 'required',
            'method' => 'required',
            'source' => 'required',
        ]);

        $user=auth()->user();


        $data['tags']=implode('_',$data['tags']);
        $data['en_tags']=implode('_',$data['en_tags']);
        $data['status']='review_plan_by_group';
        $data['side']='0';
        $plan ->update($data);


        // ثبت لاگ
        $duty=$user->duties()->whereType('edit_plan_by_student')->first();
        if($duty){
            $duty->update([
                'time'=>Carbon::now(),
                'operator_id'=> $user->id
            ]);
        }

        if($user->curt()->subject){
               // ارسال گزارش برای استاد راهنما و ادمین گروه
        $user->save_log(['expert','admin','list'=>[$user->curt()->subject->group->admin()->id,  $plan->master_id]],
            [
                'type'=>'submit_plan',
                'plan_id'=>$plan->id,
            ],true);
        $user->curt()->subject->group->admin()->save_duty( ['list'=>[$user->curt()->subject->group->admin()->id]],['type'=>'verify_plan','plan_id'=>$plan->id],false);
        }



        alert()->success(__('alert.a2'));
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
}
