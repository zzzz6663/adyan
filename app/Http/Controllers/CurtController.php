<?php

namespace App\Http\Controllers;

use App\Models\Curt;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CurtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();



        $curts=Curt::query();
        if ($request->search){
            $search=$request->search;
            $curts->where('name','LIKE',"%{$search}%");
        }
        $curts=  $curts->latest()->paginate(10);
        return view('curt.all',compact(['curts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=auth()->user();

        if($user->curt() && $user->curt()->count()>0){
            alert()->error(__('alert.a1'));
            return back();
        }

        return view('curt.create');
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
            'tags' => 'required|array|between:1,4',

            'problem' => 'required',
            'question' => 'required',
            'necessity' => 'required',
            'innovation' => 'required',
            'ostad_id' => 'nullable',
            // 'ostad' => 'required_if:ostad_id,=,new',
            // 'ostad' => 'required_if:ostad_id,=,new',
            // 'resume' => 'required_if:ostad_id,=,new',
            'ostad' => 'nullable',
            // 'resume' => 'required_if:ostad,!=,null',
            'resume' => 'required_with:ostad',
            // 'resume' => 'required_without:ostad|nullable'

        ]);

        $user=auth()->user();

        // $data['tags']=implode('_',$data['tags']);
        // if( isset($data['ostad_id'])){
        //     $data['ostad_id']=implode('_',$data['ostad_id']);
        // }
        $data['status']='review_curt_by_expert';
        $data['user_id']=$user->id;
        $data['type']='primary';
        $data['side']='0';
        $curt = Curt::create($data);
        $curt->tags()->attach($data['tags']);
        $user->update_status('curt');
        if ($request->hasFile('resume')) {
            $image = $request->file('resume');
            $name_img = 'resume_' . $curt->id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/media/curt/'), $name_img);
            $data['resume'] = $name_img;
            $curt->update([
                'resume'=>$data['resume']
            ]);
        }
        $user->update([
            'status'=>'curt'
        ]);


        // ثبت لاگ
        $duty=$user->duties()->whereType('submit_curt')->first();
        if($duty){
            $duty->update([
                'time'=>Carbon::now(),
                'operator_id'=> $user->id
            ]);
        }
        $user->save_log(['expert','admin'],['type'=>'submit_curt','operator'=>auth()->user()->id,'curt_id',$curt->id] , true );
        $user->save_duty( ['expert'],['type'=>'verify_curt','curt_id'=>$curt->id],false);


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
    public function edit(Curt $curt)
    {
        if($curt->status=='accept'){
            alert()->success(__('alert.a3'));
            return back();
        }
        if(!$curt->group_id){
            alert()->success(__('alert.a4'));
            return back();
        }
        $all_curts=$curt->user->curts()->whereType('secondary')->latest()->get();
        return view('curt.edit' ,compact(['curt','all_curts']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curt $curt)
    {
        $user=auth()->user();


       if(!$curt->side){
           alert()->error(__('alert.a5'));
           return back();
       }

       if($curt->status=='accept'){
        alert()->success(__('alert.a5'));
           return back();
       }

        $data = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'problem' => 'required',
            'question' => 'required',
            'necessity' => 'required',
            'innovation' => 'required',
        ]);

        $data['tags']=implode('_',$data['tags']);

        $data['status']='review_curt_by_master';
        $data['user_id']=$user->id;
        $data['type']='primary';
        $data['side']='0';
        $curt ->update($data);


        // ثبت لاگ
        $duty=$user->duties()->whereType('edit_curt_by_student')->latest()->first();
        if($duty){
            $duty->update([
                'time'=>Carbon::now(),
            ]);
        }

        $user->save_log( ['group','expert','admin'],[
            'type'=>'review_curt_by_master',
            'operator_id'=>auth()->user()->id,
            'curt_id'=>$curt->id
        ] ,true );
        $user->save_duty(['group'],[
            'type'=>'review_curt_by_master',
        'curt_id'=>$curt->id
        ],false);



        alert()->success(__('alert.a7'));
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
