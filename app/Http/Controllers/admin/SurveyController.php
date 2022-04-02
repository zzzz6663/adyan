<?php

namespace App\Http\Controllers\admin;
namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Survey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user= auth()->user();
        $surveys=Survey::query();
        if ($request->search){
            $search=$request->search;
            $surveys->where('name','LIKE',"%{$search}%");
        }
        $surveys=  $surveys->where('user_id', $user->id)->latest()->paginate(10);
        return view('admin.survey.all',compact(['surveys']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user= auth()->user();
        return view('admin.survey.create',compact(['user']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->plan_id && $request->curt_id){
            return back()->withErrors(['message'=>__('sentences.same_curt_plan')]);
        }

        $data = $request->validate([
            'name' => 'required',
            'masters' => 'required',
            'plan_id' => 'required_if:curt_id,!=,null',
            'curt_id' => 'required_if:plan_id,!=,null',
            // 'curt_id' => 'required_without:plan_id',
        ]);

        $user= auth()->user();
        // $survey=Survey::find(2);
        $survey = $user->survey()->create($data);
        foreach ($data['masters'] as $key => $val){
            $survey->users()->syncWithoutDetaching((int)$val);
            $data['masters'][$key]=(int)$val;
            $master=User::find($val);
            $master->save_duty( [],['type'=>'submit_survey','curt_id'=>$request->curt_id,'plan_id'=>$request->plan_id,'survey_id'=>$survey->id],true);

        }

        $user->save_log(['admin','list'=>$data['masters']],['type'=>'submit_survey','operator'=>auth()->user()->id,'curt_id'=>$request->curt_id,'plan_id'=>$request->plan_id,'survey_id'=>$survey->id ], true );


        alert()->success(__('alert.a44'));
        return redirect()->route('survey.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey)
    {
        $user= auth()->user();
        return view('admin.survey.show',compact(['user','survey']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey)
    {
        $user= auth()->user();
        return view('admin.survey.edit',compact(['user','survey']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Survey $survey)
    {
       $data=$request->validate([
           'info'=>'required'
       ]);
       $user= auth()->user();
        $duty=$user->duties()->whereType('submit_survey')->where('survey_id',$survey->id)->first();
        if($duty){
            $duty->update(['time'=> Carbon::now()]);
        }

       $data['time']=Carbon::now();

        $user->surveys()->updateExistingPivot($survey ,$data, false);
        $user->save_log(['admin','list'=>[$survey->user->id]],['type'=>'answer_survey','operator'=>auth()->user()->id ,'survey_id'=>$survey->id ], true );

       alert()->success(__('alert.a44'));
       return redirect()-> route('user.note');

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
