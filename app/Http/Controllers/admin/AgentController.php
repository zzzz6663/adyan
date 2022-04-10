<?php

namespace App\Http\Controllers\admin;

use App\Models\Tag;
use App\Models\Curt;
use App\Models\Plan;
use App\Models\User;
use NumberFormatter;
use App\Mail\UserMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function masters(Request $request)
    {
        $user=auth()->user();
        // $use=User::Find(65);
        // Mail::to($use)->send(new UserMessage('دیل رد '));
        $users=user::query();
        if ($request->search){
        //  $users->whereHas('colores',function ($query) use ($request){
        //         $search=$request->search;
        //         $query->where('name','LIKE',"%{$search}%");
        //     });
        //  $users->whereHas('product',function ($query) use ($request){
        //         $search=$request->search;
        //         $query->where('name','LIKE',"%{$search}%");
        //     });
        //  $users->whereHas('versions',function ($query) use ($request){
        //         $search=$request->search;
        //         $query->where('name','LIKE',"%{$search}%");
        //     });

        //  $users->whereHas('operators',function ($query) use ($request){
        //         $search=$request->search;
        //         $query->where('name','LIKE',"%{$search}%")
        //         ->OrWhere('family','LIKE',"%{$search}%");
        //     });
            $search=$request->search;
            $users->orWhere('name','LIKE',"%{$search}%")
            ->orWhere('family','LIKE',"%{$search}%")
            ->orWhere('mobile','LIKE',"%{$search}%");
        //  $users->where(function($query) use ($request){
        //     $search=$request->search;
        //            $query->where('code','LIKE',"%{$search}%");
        //    });
        }
        if($request->from){
            $from=$user->convert_date($request->from);
            $users->where('created_at','>=',$from);
        }
        if($request->to){
            $to=$user->convert_date($request->to);
            $users->where('created_at','<=',$to);
        }
        $users->whereLevel('master');
        // $users->where('id','>',758);

        $users=  $users->latest()->paginate(10);
        // foreach($users as $user){
        //     $user->update(['level'=>'master']);
        //     $user->assignRole('master');
        // }
        return view('admin.agent.masters',compact(['users']));
    }
    public function index(Request $request)
    {
        $user=auth()->user();
        $users=user::query();
        if ($request->search){
        //  $users->whereHas('colores',function ($query) use ($request){
        //         $search=$request->search;
        //         $query->where('name','LIKE',"%{$search}%");
        //     });
        //  $users->whereHas('product',function ($query) use ($request){
        //         $search=$request->search;
        //         $query->where('name','LIKE',"%{$search}%");
        //     });
        //  $users->whereHas('versions',function ($query) use ($request){
        //         $search=$request->search;
        //         $query->where('name','LIKE',"%{$search}%");
        //     });

        //  $users->whereHas('operators',function ($query) use ($request){
        //         $search=$request->search;
        //         $query->where('name','LIKE',"%{$search}%")
        //         ->OrWhere('family','LIKE',"%{$search}%");
        //     });
            $search=$request->search;
            $users->orWhere('name','LIKE',"%{$search}%")
            ->orWhere('family','LIKE',"%{$search}%")
            ->orWhere('mobile','LIKE',"%{$search}%");
        //  $users->where(function($query) use ($request){
        //     $search=$request->search;
        //            $query->where('code','LIKE',"%{$search}%");
        //    });
        }
        if($request->from){
            $from=$user->convert_date($request->from);
            $users->where('created_at','>=',$from);
        }
        if($request->to){
            $to=$user->convert_date($request->to);
            $users->where('created_at','<=',$to);
        }
        if($request->status){
            $users->whereStatus($request->status);
        }
        if($request->level){
            if($request->level=='guide_master'){

                // $users->whereHas('curts',function($query) use ($users){
                //     $query->where('master_id','!=',null);
                // });
                // $user->with('master_curts');
            }elseif($request->level=='guide_master'){

            }else{
                $users->whereLevel($request->level);
            }
        }
        if($request->verify){
            $users->whereVerify($request->verify);
        }



        $users=  $users->latest()->paginate(10);
        return view('admin.agent.all',compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.agent.create');
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
            'avatar' => 'nullable',
            'name' => 'required',
            'family' => 'required',
            'code' => 'required|unique:users,code',
            'mobile' => 'required|unique:users,mobile',
            'email' => 'nullable|unique:users,email',
            'password' => 'required|min:6',
            'group' => 'nullable',
            'course' => 'required',
            'level' => 'nullable',
            'expert' => 'nullable',
        ]);

       if($request->expert){
        $data['expert'] = implode('_', $data['expert']);
       }



        $user = User::create($data);
        $user->assignRole($data['level']);
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $name_img = 'avatar_' . $user->id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/media/avatar/'), $name_img);
            $data['avatar'] = $name_img;
        }
        if($data['avatar']){
            $user->update([
                'avatar'=>$data['avatar']
            ]);
        }

        alert()->success(__('alert.a25'));
        return redirect()->route('agent.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $agent)
    {
        $user=$agent;
        $logs=$user->logs()->latest()->get();
        $main_curt = $user->curt();
        $all_curts = $user->curts()->whereType('secondary')->latest()->get();
        $main_plan = $user->plan()->whereType('primary')->first();
        $all_plans = $user->plans()->whereType('secondary')->latest()->get();
        return view('admin.agent.show',compact(['user','logs','main_curt','all_curts','main_plan','all_plans']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $agent)
    {
        $user=$agent;
        return view('admin.agent.edit' ,compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $agent)
    {
        $data = $request->validate([
            'avatar' => 'nullable',
            'name' => 'required',
            'family' => 'required',
            'code' => 'required|unique:users,code,'.$agent->id,
            'mobile' => 'required|unique:users,mobile,'.$agent->id,
            'email' => 'nullable|unique:users,email,'.$agent->id,
            'password' => 'required|min:6',
            'group' => 'nullable',
            'course' => 'required',
            'level' => 'nullable',
            'expert' => 'nullable',
        ]);
        $user= $agent;
        if($request->expert){
            $data['expert'] = implode('_', $data['expert']);
           }


        $user->assignRole($data['level']);
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $name_img = 'avatar_' . $user->id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/media/avatar/'), $name_img);
            $data['avatar'] = $name_img;
        }
        $user ->update($data);

        alert()->success(__('alert.a26'));
        return redirect()->route('agent.index');
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
    public function basic_info1(Request $request )
    {
        if ( $request->isMethod('post')) {
            // dd($request->tags);

            $data = $request->validate([
                'name' => 'required',
                'family' => 'required',
                'code' => 'required',
                'title' => 'required',
                'tags' => 'required|array|between:1,4',
                'problem' => 'required',
                'question' => 'nullable',
                'necessity' => 'nullable',
                'innovation' => 'nullable',
                'master_id' => 'nullable',
                'guid_id' => 'nullable',
                'group_id' => 'required_if:status,in:firn,accept_with_guid_without_plan,accept_with_guid_with_plan,verify_by_group,accept_without_guid,faild',
                'status' => 'required',
                // 'fail_reason' => 'required_if:status,=,faild|max:1500',
                'fail_reason' => 'nullable|max:1500',
                'history' => 'nullable|max:3500',

            ]);

            $user=User::whereCode($data['code'])->first();
            if(!$user) {
                $user=User::create([
                    'name' =>$data['name'],
                    'family' =>$data['family'],
                    'code' =>$data['code'],
                    'level' =>'student',
                    'direct' =>'0',
                    'password' =>$data['code'],
                    'verify' =>'1',
                ]);
            }
            $user->assignRole('student');
            // $data['status']='review_curt_by_student';
            $data['user_id']=$user->id;
            $data['type']='primary';
            $data['side']='1';
            $curt = Curt::create($data);

            foreach($data['tags'] as $key=>$val) {
                        $tag=Tag::find($val);
                        if( !$tag){
                            $user= auth()->user();
                           $ta= $user->tags()->create(['tag'=>$val]);
                           $data['tags'][$key]=$ta->id;
                        }
                    }



            $curt->tags()->attach($data['tags']);
            $curt->user->update_status('plan');

                // ثبت لاگ
                switch($data['status']){
                    case 'faild':
                        $curt->user->save_duty( [],
                        [
                            // 'type' =>'save_curt_group_by_expert',
                            'type' =>'edit_curt_by_student',
                            'operator_id'=>auth()->user()->id,
                            'curt_id' =>$curt->id
                        ],true);
                        $curt->user->save_log(['admin', 'expert'],
                        [
                            'type'=>'edit_curt_by_student',
                            'operator_id'=> auth()->user()->id,
                            'curt_id' =>$curt->id,
                            'group_id' =>$data['group_id']
                        ]
                        , true);
                        alert()->success('کاربر با موفقیت ساخته شد ');
                        return redirect()->route('admin.basic.info1');
                    break;


                    case 'no_verifyed':
                        $curt->update([
                            'side' =>0
                        ]);

                        $curt->user->save_log(['expert'],
                        [
                            'type'=>'verify_curt_by_expert',
                            'curt_id' =>$curt->id,
                        ]
                        , true);
                        $user->save_duty( ['expert'],['type'=>'verify_curt','curt_id'=>$curt->id],false);
                        alert()->success('کاربر با موفقیت ساخته شد ');
                        return redirect()->route('admin.basic.info1');
                    break;

                    case 'verify_by_group':
                        $curt->update([
                            'side' =>0
                        ]);
                        $curt->user->save_log([''],
                        [
                            'type'=>'pass_curt_to_group',
                            'curt_id' =>$curt->id,
                        ]
                        , true);
                        $user->save_duty(['group'],[
                            'type'=>'review_curt_by_master',
                        'curt_id'=>$curt->id,
                        'group_id' =>$data['group_id']
                        ],false);

                        alert()->success('کاربر با موفقیت ساخته شد ');
                        return redirect()->route('admin.basic.info1');
                    break;

                    case 'accept_with_guid_without_plan':
                        $curt->user->save_log(['admin'],
                        [
                            'type'=>'accept_curt',
                            'operator_id'=> auth()->user()->id,
                            'curt_id' =>$curt->id,

                        ]
                        ,true );
                        $curt->user->save_duty( [],['type'=>'submit_plan'], true);
                        $curt->user->update_status('plan');
                        alert()->success('کاربر با موفقیت ساخته شد ');
                        return redirect()->route('admin.basic.info1');
                    break;

                    case 'accept_with_guid_with_plan':
                        alert()->success('کاربر با موفقیت ساخته شد ');
                        $curt->user->update_status('plan');
                        return redirect()->route('admin.basic.info2');
                    break;



                    case 'accept_without_guid':
                        $curt->user->save_log(['admin',],
                        [
                            'type'=>'accept_without_guid',
                            'operator_id'=> auth()->user()->id,
                            'curt_id' =>$curt->id,
                            'group_id' =>$data['group_id']
                        ]
                        ,true );
                        $curt->group->admin()->save_duty( [],['type'=>'define_guid'], true);
                        alert()->success('کاربر با موفقیت ساخته شد ');
                        return redirect()->route('admin.basic.info1');
                    break;


                }


        }
        return view('admin.agent.basic_info1');
    }
    public function basic_info2(Request $request ,User $user)
    {
        if ( $request->isMethod('post')) {


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
                'report' => 'required|max:2048',
                'state' => 'required',
            ]);



            $data['confirm_master']='1';
            $data['group_id']=$user->curt()->group_id;
            $data['master_id']=$user->curt()->master_id;
            $data['tags']=implode('_',$data['tags']);
            $data['en_tags']=implode('_',$data['en_tags']);

            if(!$data['state']){
                $data['status']='review_plan_by_student';
                $data['side']='1';
            }else{
                $data['status']='accept';
                $data['side']='0';
            }
            $data['user_id']=$user->id;
            $data['type']='primary';


            $plan = Plan::create($data);
            if ($request->hasFile('report')) {
                $image = $request->file('report');
                $name_img = 'report_' . $plan->id . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/media/plan/'), $name_img);
                $data['report'] = $name_img;
                $plan->update([
                    'report'=>$data['report']
                ]);
            }
            $user->update([
                'status'=>'plan'
            ]);
            if(  $user->curt()->guid_id){
                $plan ->update([
                    'guid_id'=> $user->curt()->guid_id
                ]);
                $user->save_log( ['admin','list'=>[ $user->id]],
                [
                    'type'=>'select_plan_guid',
                    'operator_id'=>  $user->curt()->guid_id,
                    'plan_id' =>$plan->id,
                ]
                , true);
            }




            if ($data['state'] != '1') {
                $plan->user->save_duty( [],
                [
                    'type' =>'edit_plan_by_student',
                    'group_id'=>$plan->group_id,
                    'plan_id' =>$plan->id
                ],true);
                $plan->user->save_log(['admin', 'expert'],
                [
                    'type'=>'edit_plan_by_student',
                    'group_id'=> $plan->group_id,
                    'plan_id' =>$plan->id
                ]
                , true);
            } else {
                $plan->user->save_log(['admin', 'list'=>[$plan->master_id,$plan->group_id]],
                [
                    'type'=>'accept_plan',
                    'group_id'=> $plan->group_id,
                    'plan_id' =>$plan->id
                ]
                ,true );
                $plan->user->update_status('booklet');

            }

            alert()->success('طرح با موفقیت ثبت  شد ');
        return redirect()->route('admin.basic.info2');

        }


        return view('admin.agent.basic_info2',compact(['user']));
    }
    public function profile(Request $request ,User $user)
    {

        $logs=$user->logs()->latest()->get();
        $main_curt = $user->curt();
        $all_curts = $user->curts()->whereType('secondary')->latest()->get();
        $main_plan = $user->plan()->whereType('primary')->first();
        $all_plans = $user->plans()->whereType('secondary')->latest()->get();
        return view('admin.agent.profile',compact(['user','logs','main_curt','all_curts','main_plan','all_plans']));
    }

}
