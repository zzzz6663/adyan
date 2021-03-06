<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Log;
use App\Models\Tag;
use App\Models\Curt;
use App\Models\Duty;
use App\Models\Plan;
use App\Models\User;
use App\Models\Group;
use App\Models\Session;
use App\Models\Subject;
use App\Mail\UserMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index()
    {
        return redirect()->route('agent.all');
        return view('admin.index');
    }
    public function curt_detail(User $user)
    {
        if($user->level != 'student'){
            alert()->error(__('alert.a58'));
            return back();
        }
        $main_curt=$user->curt();
        if(!$main_curt ){
            alert()->error(__('alert.a59'));
            return back();
        }
        $all_curts = $user->curts()->whereType('secondary')->latest()->get();
        return view('curt.curt_detail',compact(['user','all_curts']));
    }
    public function plan_detail(User $user)
    {
        if($user->level != 'student'){
            alert()->error(__('alert.a58'));
            return back();
        }
        $main_plan=$user->primary_plan();

        if(!$main_plan ){

            alert()->error(__('alert.a60'));
            return back();
        }

        $all_plans = $user->plans()->whereType('secondary')->latest()->get();
        return view('plan.plan_detail',compact(['user','all_plans','main_plan']));
    }

    public function similar(Request $request)
    {
        $tags= [ ];

        $similar_subjects = Subject::whereStatus('1')->whereHas('tags',function($query)  use($tags){
            $query->where('id',$tags[0]);
            if(sizeof($tags)>1){
                for($i=1;$i<sizeof($tags);$i++){
                    $query->orWhere('id',$tags[$i]);

                }
            }
        })->get();
        $similar_curt = Curt::whereHas('tags',function($query)  use($tags){
            $query->where('id',$tags[0]);
            if(sizeof($tags)>1){
                for($i=1;$i<sizeof($tags);$i++){
                    $query->orWhere('id',$tags[$i]);

                }
            }
        })->whereStatus('accept')->get();

        return response()->json([
            'body' => view('curt.similar_tags', compact(['similar_curt' ,'similar_subjects']))->render(),
        ]);
    }
    public function all_quiz()
    {
        // $posts = Post::whereHas('comments', function($query) {
        //     $query->where('comment', 'like', 'foo%');
        // });
        // $top = Top::with(['articles' => function ($q) {
        //     $q->orderBy('pivot_range', 'asc');
        //   }])->first(); // or get() or whatever
       $quizzes= DB::table('quiz_user')->where('number','!=',null)->where('time','!=',null)->orderBy('time','desc')->paginate(10);

        return view('admin.quiz.all_quiz',compact(['quizzes']));
    }
    public function curt(Request $request)
    {
        $user=auth()->user();

            // // ?????? ?????????? ??????????
            // $duty = $user-operator_duty>()->whereType('verify_curt')->where('curt_id', 44)->first();
            // dd( $duty );
        $curts = Curt::query();
        if ($request->search) {
            $search = $request->search;
            $curts->where('name', 'LIKE', "%{$search}%");
        }
        $curts =  $curts->where('type', 'primary')->latest()->paginate(10);

        return view('curt.all', compact(['curts']));
    }
    public function show_curt(Request $request, Curt $curt, Duty $duty)
    {
        if( $curt->side || $curt->status=='accept_without_master'){
            alert()->error(__('alert.a39'));
            return back();
        }
        $session= session()->get('session');

        //  ?????? ?????????????? ?? ???????? ???? ??????????
        if ($duty) {
            $duty->update([
                'operator_id' => auth()->user()->id,
                'time' => Carbon::now()
            ]);
        }
        $main_curt = $curt;
        $all_curts = $curt->user->curts()->whereType('secondary')->latest()->get();

      $masters= User::where('level','master')->orWhereHas('master_curts',function($query){
        $query->whereType('primary')->where('Status','!=','accept');
      })->get();
    //   dd($masters);

        return view('curt.show', compact(['main_curt', 'all_curts', 'session','masters']));
    }

    public function similar_curt(Request $request )
    {

        // return response()->json([
        //     'body' => $request->all(),
        //     'tags'=>$request->tags,
        //     'sss'=>1222222221
        // ]);
        $tags=$request->tags;


        $similar_subjects = Subject::whereStatus('1')->whereHas('tags',function($query)  use($tags){
            $query->whereIn('id', $tags);
            // $query->where('id',$tags[0]);
            // if(sizeof($tags)>1){
            //     for($i=1;$i<sizeof($tags);$i++){
            //         $query->orWhere('id',$tags[$i]);

            //     }
            // }
        })->take(10)->get();
        // $similar_curt = Curt::whereHas('tags',function($query)  use($tags){
        //     // $query->where('id',$tags[0]);
        //     $query->whereIn('id', $tags);
        //     // if(sizeof($tags)>1){
        //     //     for($i=1;$i<sizeof($tags);$i++){
        //     //         $query->orWhere('id',$tags[$i]);

        //     //     }
        //     // }
        // })->take(10)->get();
        $similar_curt = Curt::whereType('primary')    ->withCount('tags')->orderBy('tags_count', 'desc')


        ->whereHas('tags',function($query)  use($tags){
            // $query->where('id',$tags[0]);
            // $query->whereIn('id', $tags);
            if(sizeof($tags)>1){
                for($i=1;$i<sizeof($tags);$i++){
                    $query->orWhere('id',$tags[$i]);

                }
            }
        })



        ->take(10)->get();
        return response()->json([
            'body' => view('curt.similar_tags', compact(['similar_subjects','similar_curt' ]))->render(),
        ]);

    }
    public function show_plan(Request $request, Plan $plan)
    {

        $session= session()->get('session');

        $main_plan = $plan;
        $all_plans = $plan->user->plan()->whereType('secondary')->latest()->get();

        return view('plan.show', compact(['main_plan', 'all_plans', 'session']));
    }
    //  public function save_curt_master(Curt $curt ,Request $request)
    //  {
    //      $valid=$request->validate([
    //          'master_id'=>'required'
    //      ]);
    //      $curt->update($valid);
    //      alert()->success('?????????? ???????????? ???? ???????????? ???????????? ????');
    //      return back();

    //  }
    public function save_curt_group(Curt $curt, Request $request)
    {
        $user = auth()->user();


        // ?????? ?????????? ??????????
        $duty = Duty::whereType('verify_curt')->where('curt_id', $curt->id)->first();
        if ($duty) {
            $duty->update([
                'operator_id' => auth()->user()->id,
                'time' => Carbon::now()
            ]);
        }


        $valid = $request->validate([
            'group_id' => 'required|exists:groups,id'
        ]);
        $curt->update($valid);
        $group = Group::find($valid['group_id']);

        $admin = $group->admin();
        $curt->user->save_log( ['admin', 'expert', 'group'],
        [
            'type'=>'save_curt_group_by_expert',
            'operator_id'=> $user->id,
            'curt_id' =>$curt->id,
            'group_id' =>$group ->id
        ], true);
        $ar = array();
        // //?????? ?????? ???? ?????? ???????????? ???????? ???????? ???????? ???????? ???????? ???????? ???????? ?????????? ??????
        if (!$curt->side) {
            $ar = ['list'=>[$admin->id]];
        }


        $curt->user->save_duty($ar,
        [
            'type'=>'review_curt_by_master',
            'operator_id'=>auth()->user()->id,
            'curt_id' =>$curt->id
        ]
        , false);



        alert()->success(__('alert.a19'));
        return redirect()->route('user.note');
    }
    public function see_profile_before_verify_student(Request $request, User $user, Duty $duty)
    {
        $logs=$user->logs()->latest()->paginate(10, ['*'], 'logs');
        $main_curt = $user->curt();
        $all_curts = $user->curts()->whereType('secondary')->latest()->get();
        $main_plan = $user->plan()->whereType('primary')->first();
        $all_plans = $user->plans()->whereType('secondary')->latest()->get();

        return view('admin.agent.see_profile_before_verify_student',compact(['user','duty','logs','main_curt','all_curts','main_plan','all_plans']));
    }
    public function verify_student(Request $request, User $user, Duty $duty)
    {


          // ?????? ??????

        if($request->confirm){
            $user->save_log( ['admin', 'expert'],['type'=>'verify','operator_id'=>auth()->user()->id], true );
            $user->save_duty( [],['type'=>'student_go_quiz'], true);
             //???????? ???????????? ???????? ????
            $user->update([
                'verify' => '1'
            ]);
            $user->update_status('quiz');
            // ?????? ?????????????? ?? ????????
            $duty->update([
                'operator_id' => auth()->user()->id,
                'time' => Carbon::now()
            ]);

            alert()->success(__('alert.a20'));
        }
        if($request->remove){
            if(!$request->reason){
                return redirect()->back()->withErrors(['msg' => __('alert.a52')]);
            }
          $log=  $user->logs()->where('type','register')->first();
          try {

            Mail::to($user)->send(new UserMessage($request->reason,__('sentences.reason_title')));
            if($log){
                $log->delete();
            }
            $user->delete();
            $duty->delete();


          } catch (\Exception $e) {

              return $e->getMessage();
          }

            alert()->success(__('alert.a51'));
        }





        return redirect()->route('user.note');
    }
    public function admin_plan_confirm(Plan $plan, Request $request)
    {
        $data = $request->validate([
            'confirm_master' =>'required',
            'info_master' =>'required_if:confirm_master,=,0',
        ]);
        $duty = $plan->master->duties()->where('plan_id', $plan->id)->whereIn('type',['confirm_plan_by_master','verify_plan_by_master'])->where('time', null)->latest()->first();
        if ( $duty) {
            $duty->update([
                'time' => Carbon::now()
            ]);
        }
        $data['user_id']=$plan->user_id;
        $data['master_id']=$plan->master_id;
        $data['group_id']=$plan->group_id;
        $data['type']='secondary';
        Plan::create($data);




            // ?????? ??????
            if ($data['confirm_master'] != '1') {
                $plan->user->save_duty( [],
                [
                    'type' =>'edit_plan_by_student',
                    'group_id'=>$plan->group_id,
                    'plan_id' =>$plan->id
                ],true);
                $plan->user->save_log(['admin','list'=>[$plan->master_id]],
                [
                    'type'=>'edit_plan_by_student_from_master',
                    'plan_id' =>$plan->id,
                    'operator_id'=> $plan->master_id,
                ]
                , true);

            } else {
                $plan->user->save_log(['admin','group' ,'list'=>[$plan->master_id,$plan->group->admin()->id]],
                [
                    'type'=>'confirm_plan',
                    'group_id'=> $plan->group_id,
                    'operator_id'=> $plan->master_id,
                    'plan_id' =>$plan->id
                ]
                ,true );
                $plan->group->admin()->save_duty( ['list'=>[ $plan->group->admin()->id]],['type'=>'verify_plan','plan_id'=>$plan->id],false);
                $plan->update(['side'=>'0' ,'confirm_master'=>'1']);
            }
            alert()->success(__('alert.a15'));
            return redirect()->route('user.note');
    }
    public function admin_plan_submit(Plan $plan, Request $request)
    {

        // if ($plan->side == 1) {
        //     alert()->error(__('alert.a22'));
        //     return back();
        // }
        $data = $request->validate([
            'title' =>'nullable|max:1500',
            'en_title' =>'nullable|max:1500',
            'tags' =>'nullable|max:1500',
            'en_tags' =>'nullable|max:1500',
            'problem' =>'nullable|max:1500',
            'necessity' =>'nullable|max:1500',
            'question' =>'nullable|max:1500',
            'sub_question' =>'nullable|max:1500',
            'hypo' =>'nullable|max:1500',
            'theory' =>'nullable|max:1500',
            'structure' =>'nullable|max:1500',
            'method' =>'nullable|max:1500',
            'source' =>'nullable|max:1500',
            'concepts' =>'nullable|max:1500',
            'goals' =>'nullable|max:1500',
            'history' =>'nullable|max:1500',
            'status' =>'required',
            'note' => 'nullable|max:3500',
            'guid_id' => 'nullable|exists:users,id',

        ]);

        $plan->update([
            'status'=> $data['status'],
            'side'=> '1'
        ]);
        $data['user_id']=$plan->user_id;
        $data['master_id']=$plan->master_id;
        $data['group_id']=$plan->group_id;
        $data['type']='secondary';
        Plan::create($data);
        $user=auth()->user();
        if(isset($data['guid_id'])){
             if($plan->user->curt()){
                $plan->user->curt()->update(['guid_id'=>$data['guid_id']]);
             }
            $plan->update(['guid_id'=>$data['guid_id']]);
            $plan->user->save_log( ['admin','list'=>[ $user->id ,$data['guid_id'] ]],
            [
                'type'=>'select_plan_guid',
                'operator_id'=>  $data['guid_id'],
                'plan_id' =>$plan->id,
            ]
            , true);
        }





           // ?????? ??????
           if ($data['status'] != 'accept') {
            $plan->user->save_duty( [],
            [
                'type' =>'edit_plan_by_student',
                'group_id'=>$plan->group_id,
                'plan_id' =>$plan->id
            ],true);
            $plan->user->save_log(['admin'],
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
            $plan->update(['status'=>'accept', 'down' => Carbon::now()]);
        }

        $duty = $plan->group->admin()->duties()->where('plan_id', $plan->id)->whereIn('type',['verify_plan_by_master','verify_plan'])->where('time', null)->latest()->first();
        if ( $duty) {
            $duty->update([
                'time' => Carbon::now()
            ]);
        }
        if ($request->session_id) {
             // ???????????? ???? ?????????? ???????? ????????
        $plan->sessions()->updateExistingPivot($request->session_id,
        [
            'title'=>  $plan->title,
            'status'=>  $plan->status,
            'guid_id'=>  $plan->guid_id,
            'master_id'=>  $plan->master_id,
            'down'=>  Carbon::now(),
       ], false);
            alert()->success(__('alert.a42'));
            return redirect()->route('session.show',$request->session_id);
        }






        alert()->success(__('alert.a15'));
        return redirect()->route('user.note');

    }
    public function admin_curt_submit(Curt $curt, Request $request)
    {
        $user = auth()->user();
        // ?????? ?????????? ??????????

        if ($user->level == 'expert' && $user->operator_curts()->where('user_id',$curt->user->id)->count() > 0) {
            alert()->error(__('alert.a21'));
            return back();
        }
        if ($curt->side == 1) {
            alert()->error(__('alert.a22'));
            return back();
        }
         if($user->level == 'expert' && !$request->group_id){
            alert()->error(__('alert.a55'));
            return back();
        }

        if($user->level == 'expert'){
            $valid = $request->validate([
                'title' => 'nullable|max:500',
                'tags' => 'required|array|between:1,12',
                'problem' => 'nullable:max:1000',
                'question' => 'nullable:max:1000',
                'necessity' => 'nullable:max:1000',
                'innovation' => 'nullable:max:1000',
                'master_id' => 'nullable|exists:users,id',
                'guid_id' => 'nullable|exists:users,id',
                'note' => 'nullable|max:3500',
                'status' => 'required',
            ]);
        }

        if($user->level  == 'master'){
            $valid = $request->validate([
                'title' => 'nullable|max:500',
                'tags' => 'required|array|between:1,12',
                'problem' => 'nullable:max:1000',
                'question' => 'nullable:max:1000',
                'necessity' => 'nullable:max:1000',
                'innovation' => 'nullable:max:1000',
                'master_id' => 'required_if:status,=,accept',
                'guid_id' => 'nullable|exists:users,id',
                'note' => 'nullable|max:3500',
                'status' => 'required',
            ]);
        }

        foreach($valid['tags'] as $key=>$val) {
            $tag=Tag::find($val);
            if( !$tag){
                $user= auth()->user();
               $ta= $user->tags()->create(['tag'=>$val]);
               $valid['tags'][$key]=$ta->id;
            }
        }
        $curt->tags()->sync($valid['tags']);
        //  $valid['status']='progress';
        $valid['user_id'] = $curt->user_id;
        $valid['type'] = 'secondary';
        $valid['side'] = '1';
        $valid['operator_id'] = $user->id;
        $new_curt = Curt::create($valid);




        if($user->level == 'expert' && !$curt->group_id){
            $data = $request->validate([
                'group_id' => 'required|exists:groups,id'
            ]);
            $curt->update(['group_id'=>$data['group_id']]);
            $group = Group::find($data['group_id']);

            $admin = $group->admin();
            $curt->user->save_log( ['admin', 'expert', 'group'],
            [
                'type'=>'save_curt_group_by_expert',
                'operator_id'=> $user->id,
                'curt_id' =>$curt->id,
                'group_id' =>$group ->id
            ], true);
            $ar = array();
            // //?????? ?????? ???? ?????? ???????????? ???????? ???????? ???????? ???????? ???????? ???????? ???????? ?????????? ??????
            if ($curt->side || $valid['status']=='pass_to_group') {
                $ar = ['list'=>[$admin->id]];
            }
            $curt->user->save_duty($ar,
            [
                'type'=>'review_curt_by_master',
                'operator_id'=>auth()->user()->id,
                'curt_id' =>$curt->id
            ]
            , false);

        }





        if ($user->level == 'expert') {
            $duty = Duty::whereType('verify_curt')->where('curt_id', $curt->id)->whereNull('time')->first();
            if ($duty) {
                $duty->update([
                    'operator_id' => auth()->user()->id,
                    'time' => Carbon::now()
                ]);
            }
        }


              // ?????? ??????
              switch ($valid['status']){
                case 'pass_to_group':
                    $curt->update([
                        'status' => 'review_curt_by_master',
                        'side' => '0',
                    ]);
                    break;
                case 'accept':
                    $curt->update([
                        // 'status' => 'edit_curt_by_student',
                        'status' => 'accept',
                        'side' => '1',
                        'down' => Carbon::now(),
                        'master_id' =>  $valid['master_id']

                    ]);
                    $curt->user->save_log(['admin', 'expert', 'group'],
                    [
                        'type'=>'accept_curt',
                        'operator_id'=> auth()->user()->id,
                        'curt_id' =>$curt->id,

                    ]
                    ,true );

                    // $curt->user->save_log( ['admin','list'=>[ $valid['master_id']]],
                    // [
                    //     'type'=>'select_curt_master',
                    //     'operator_id'=> auth()->user()->id,
                    //     'curt_id' =>$curt->id,
                    // ]
                    // , true);
                    $user->save_duty([ 'expert'],['type'=>'check_and_confirm_master_id','curt_id'=>$curt->id] );
                    // $curt->user->save_duty( [],['type'=>'submit_plan'], true);
                    // $curt->user->update_status('plan');
                    $curt->update(['status'=>'accept']);
                    break;
                case 'accept_without_master':
                    $curt->update([
                        'status' => 'accept_without_master',
                        'side' => '0',
                    ]);

                    $curt->user->save_log([ 'group'],
                    [
                        'type'=>'accept_without_master',
                        'operator_id'=> auth()->user()->id,
                        'curt_id' =>$curt->id,
                    ]
                    ,true );
                    $curt->group->admin()->save_duty( [],[
                        'type'=>'define_guid',
                        'curt_id' =>$curt->id,
                        ]
                    , true);

                 break;


                case 'faild':
                case 'reject':
                    $curt->update([
                        'status' => $valid['status'],
                        // 'status' => 'edit_curt_by_student',
                        'side' => '1',

                    ]);
                    $curt->user->save_duty( [],
                    [
                        'type' =>'edit_curt_by_student',
                        'operator_id'=>auth()->user()->id,
                        'curt_id' =>$curt->id
                    ],true);
                    $curt->user->save_log(['admin', 'expert', 'group'],
                    [
                        'type'=>'edit_curt_by_student',
                        'operator_id'=> auth()->user()->id,
                        'curt_id' =>$curt->id
                    ]
                    , true);
                    break;

            }





        if (isset($valid['guid_id'])) {
            $curt->update([
                'guid_id' =>  $valid['guid_id']
            ]);
            $curt->user->save_log( ['admin','list'=>[ $valid['master_id']]],
            [
                'type'=>'select_curt_guid',
                'operator_id'=>  $valid['guid_id'],
                'curt_id' =>$curt->id,
            ]
            , true);
        }


        $duty = $user->duties()->where('curt_id', $curt->id)->whereType('review_curt_by_master')->where('time', null)->latest()->first();
        if ($user->level == 'master' && $duty) {
            $duty->update([
                'time' => Carbon::now()
            ]);
        }

        $duty = $user->duties()->where('curt_id', $curt->id)->whereType('verify_curt')->where('time', null)->latest()->first();
        if ($user->level == 'expert' && $duty) {
            $duty->update([
                'time' => Carbon::now()
            ]);
        }

        // ???????????? ???? ?????????? ???????? ????????
        $curt->sessions()->updateExistingPivot($request->session_id,
         [
             'title'=>  $curt->title,
             'status'=>  $curt->status,
             'guid_id'=>  $curt->guid_id,
             'master_id'=>  $curt->master_id,
             'down'=> Carbon::now(),
        ]);

        if ($request->session_id) {

            alert()->success(__('alert.a24'));

            return redirect()->route('session.show',$request->session_id);
        }






        alert()->success(__('alert.a15'));

           return redirect()->route('user.note');
    }
    public function define_guid(Request $request, Curt $curt){

        if ( $request->isMethod('post')) {

            $duty=Duty::where('curt_id', $curt->id)->whereType('define_guid')->where('time',null)->latest()->first();
            if(!$duty){
                alert()->error(__('alert.a67'));
                return redirect()->route('user.note');
            }


            $data=$request->validate([
                'master_id'=>'required'
            ]);
            $duty->update([
                'time' =>Carbon::now()
            ]);
            $curt->user->save_log( ['admin','group','list'=>[$data['master_id']]],
            [
                'type'=>'select_curt_master',
                'operator_id'=> auth()->user()->id,
                'curt_id' =>$curt->id,
            ]
            , true);

           $user= auth()->user();
            $user->save_duty([ 'expert'],['type'=>'check_and_confirm_master_id','curt_id'=>$curt->id] );
            // $curt->user->save_duty( [],['type'=>'submit_plan'], true);
            // $curt->user->update_status('plan');
            $curt->update($data);
           alert()->success(__('alert.a54'));
            return redirect()->route('user.note');
        }
        return view('curt.define_guid' ,compact(['curt']));
    }
    public function expert_confirm_master_before_plan(Request $request, Curt $curt){

        if ( $request->isMethod('post')) {
              $duty=Duty::where('curt_id', $curt->id)->whereType('check_and_confirm_master_id')->where('time',null)->latest()->first();
              $duty->update([
                'time' =>Carbon::now()
            ]);

            if($request->confirm){
            $curt->user->save_duty( [],['type'=>'submit_plan'], true);
            $curt->user->update_status('plan');
            $curt->user->save_log( ['expert','group','list'=>[$curt->user->id,$curt->master()->id]],
            [
                'type'=>'expert_confirm_master',
                'operator_id'=> auth()->user()->id,
                'curt_id' =>$curt->id,
            ]
            , true);
            }
            if($request->reject){
                $curt->group->admin()->save_duty( [],[
                    'type'=>'define_guid',
                    'curt_id' =>$curt->id,
                    ]
                , true);
                $curt->user->save_log( ['expert','group','list'=>[$curt->user->id,$curt->master()->id]],
                [
                    'type'=>'expert_reject_master',
                    'operator_id'=> auth()->user()->id,
                    'curt_id' =>$curt->id,
                ]
                , true);
            }
           alert()->success(__('alert.a54'));
            return redirect()->route('user.note');
        }
        return view('curt.confirm_master' ,compact(['curt']));
    }

    public function my_mission(){
        $user=auth()->user();
        $curts=$user->master_curts()->whereType('primary')->whereSide('0')->latest()->get();
        $plans=$user->master_plans()->whereType('primary')->whereSide('0')->latest()->get();
        $subjects=$user->subjects()->wherestatus(null)->latest()->get();
        return view('admin.master.my_mission' ,compact(['user','curts','plans','subjects']));
    }
    public function group_mission(Request $request){
        $user=auth()->user();
        $curts=null;
        $plans=null;
        $group=null;
        $subjects=null;
        if($request->group_id){
            $group= Group::find($request->group_id);
            $plans=$group->plans()->where('status','!=','accept')->whereType('primary')->latest()->get();
            $curts=$group->curts()->where('status','!=','accept')->whereType('primary')->latest()->get();
            $subjects=$group->subjects()->whereStatus(null)->latest()->get();
        }

        return view('admin.group.group_mission' ,compact(['user','group','curts','plans','subjects']));
    }
}
