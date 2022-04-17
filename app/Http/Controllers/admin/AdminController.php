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
        })->get();

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
       $quizzes= DB::table('quiz_user')->where('number','!=',null)->where('time','!=',null)->orderBy('time','asc')->paginate(10);
        return view('admin.quiz.all_quiz',compact(['quizzes']));
    }
    public function curt(Request $request)
    {
        $user=auth()->user();

            // // ثبت پایان وظیفه
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
        $session= session()->get('session');

        //  ثبت اپراتور و زمان در وظیفه
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
        $similar_curt = Curt::whereHas('tags',function($query)  use($tags){
            // $query->where('id',$tags[0]);
            $query->whereIn('id', $tags);
            // if(sizeof($tags)>1){
            //     for($i=1;$i<sizeof($tags);$i++){
            //         $query->orWhere('id',$tags[$i]);

            //     }
            // }
        })->take(10)->get();
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
    //      alert()->success('استاد راهنما با موفقیت انتخاب شد');
    //      return back();

    //  }
    public function save_curt_group(Curt $curt, Request $request)
    {
        $user = auth()->user();


        // ثبت پایان وظیفه
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
        // //اگر طرح در سمت دانشجو نبود یعنی تسکی باید برای مدیر گروه تعریف شود
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
        return back();
    }
    public function see_profile_before_verify_student(Request $request, User $user, Duty $duty)
    {
        $logs=$user->logs()->latest()->get();
        $main_curt = $user->curt();
        $all_curts = $user->curts()->whereType('secondary')->latest()->get();
        $main_plan = $user->plan()->whereType('primary')->first();
        $all_plans = $user->plans()->whereType('secondary')->latest()->get();

        return view('admin.agent.see_profile_before_verify_student',compact(['user','duty','logs','main_curt','all_curts','main_plan','all_plans']));
    }
    public function verify_student(Request $request, User $user, Duty $duty)
    {


          // ثبت لاگ


        if($request->confirm){
            $user->save_log( ['admin', 'expert'],['type'=>'verify','operator_id'=>auth()->user()->id], true );
            $user->save_duty( [],['type'=>'student_go_quiz'], true);
             //حساب دانسجو فعال شد
            $user->update([
                'verify' => '1'
            ]);
            $user->update_status('quiz');
            // ثبت اپراتور و زمان
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
          Mail::to($user)->send(new UserMessage($request->reason,__('sentences.reason_title')));
                if($log){
                    $log->delete();
                }
            $user->delete();
            $duty->delete();

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
        $duty = $plan->master->duties()->where('plan_id', $plan->id)->whereType('verify_plan_by_master')->where('time', null)->latest()->first();
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




            // ثبت لاگ
            if ($data['confirm_master'] != '1') {
                $plan->user->save_duty( [],
                [
                    'type' =>'edit_plan_by_student',
                    'group_id'=>$plan->group_id,
                    'plan_id' =>$plan->id
                ],true);
                $plan->user->save_log(['admin'],
                [
                    'type'=>'edit_plan_by_student_from_master',
                    'plan_id' =>$plan->id
                ]
                , true);
            } else {
                $plan->user->save_log(['admin', 'list'=>[$plan->master_id]],
                [
                    'type'=>'confirm_plan',
                    'group_id'=> $plan->group_id,
                    'operator_id'=> $plan->master_id,
                    'plan_id' =>$plan->id
                ]
                ,true );
                $plan->group->admin()->save_duty( ['list'=>[ $plan->group->admin()->id]],['type'=>'verify_plan','plan_id'=>$plan->id],false);

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
            'title' =>'nullable',
            'en_title' =>'nullable',
            'tags' =>'nullable',
            'en_tags' =>'nullable',
            'problem' =>'nullable',
            'necessity' =>'nullable',
            'question' =>'nullable',
            'sub_question' =>'nullable',
            'hypo' =>'nullable',
            'theory' =>'nullable',
            'structure' =>'nullable',
            'method' =>'nullable',
            'source' =>'nullable',
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
            $plan->update(['guid_id'=>$data['guid_id']]);
            $plan->user->save_log( ['admin','list'=>[ $user->id ,$data['guid_id'] ]],
            [
                'type'=>'select_plan_guid',
                'operator_id'=>  $data['guid_id'],
                'plan_id' =>$plan->id,
            ]
            , true);
        }





           // ثبت لاگ
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

        }



        if ($request->session_id) {
            $duty = $plan->group->admin()->duties()->where('plan_id', $plan->id)->whereType('verify_plan')->where('time', null)->latest()->first();
            if ( $duty) {
                $duty->update([
                    'time' => Carbon::now()
                ]);
            }
            alert()->success(__('alert.a42'));
            return redirect()->route('session.show',$request->session_id);
        }






        alert()->success(__('alert.a15'));
        return redirect()->route('user.note');

    }
    public function admin_curt_submit(Curt $curt, Request $request)
    {
        $user = auth()->user();
        // ثبت پایان وظیفه

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

        $valid = $request->validate([
            'title' => 'nullable',
      'tags' => 'required|array|between:1,12',
            'problem' => 'nullable',
            'question' => 'nullable',
            'necessity' => 'nullable',
            'innovation' => 'nullable',
            'master_id' => 'nullable|exists:users,id',
            'guid_id' => 'nullable|exists:users,id',
            'note' => 'nullable|max:3500',
            'status' => 'required',
        ]);
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


        $curt->update([
            'status' => 'edit_curt_by_student',
            'side' => '1',

        ]);

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
            // //اگر طرح در سمت دانشجو نبود یعنی تسکی باید برای مدیر گروه تعریف شود
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

        }





        if ($user->level == 'expert') {
            $duty = Duty::whereType('verify_curt')->where('curt_id', $curt->id)->first();
            if ($duty) {
                $duty->update([
                    'operator_id' => auth()->user()->id,
                    'time' => Carbon::now()
                ]);
            }
        }

        // ثبت لاگ
        if ($valid['status'] != 'accept') {
            $curt->user->save_duty( [],
            [
                'type' =>'edit_curt_by_student',
                'operator_id'=>auth()->user()->id,
                'curt_id' =>$curt->id
            ],true);
            $curt->user->save_log(['admin', 'expert'],
            [
                'type'=>'edit_curt_by_student',
                'operator_id'=> auth()->user()->id,
                'curt_id' =>$curt->id
            ]
            , true);

        } else {
            $curt->user->save_log(['admin', 'expert', 'group'],
            [
                'type'=>'accept_curt',
                'operator_id'=> auth()->user()->id,
                'curt_id' =>$curt->id,

            ]
            ,true );

            $curt->user->save_duty( [],['type'=>'submit_plan'], true);
            $curt->user->update_status('plan');
        }


        if (isset($valid['master_id'])) {
            $curt->update([
                'master_id' =>  $valid['master_id']
            ]);
            $curt->user->save_log( ['admin','list'=>[ $valid['master_id']]],
            [
                'type'=>'select_curt_master',
                'operator_id'=> auth()->user()->id,
                'curt_id' =>$curt->id,
            ]
            , true);
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



        if ($request->session_id) {
            $duty = $user->duties()->where('curt_id', $curt->id)->whereType('review_curt_by_master')->where('time', null)->latest()->first();
            if ($user->level == 'master' && $duty) {
                $duty->update([
                    'time' => Carbon::now()
                ]);
            }
            alert()->success(__('alert.a24'));

            return redirect()->route('session.show',$request->session_id);
        }






        alert()->success(__('alert.a15'));

           return redirect()->route('user.note');
    }
    public function define_guid(Request $request, Curt $curt){

        if ( $request->isMethod('post')) {
            $duty=Duty::where('curt_id', $curt->id)->whereType('define_guid')->latest()->first();
            $duty->update([
                'time' =>Carbon::now()
            ]);
            $data=$request->validate([
                'guid_id'=>'required'
            ]);
            $curt->update($data);
            return redirect()->route('user.note');
        }
        return view('curt.define_guid' ,compact(['curt']));
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
        if($request->group_id){
            $group= Group::find($request->group_id);
            $plans=$group->plans()->whereStatus('accept')->whereType('primary')->latest()->get();
            $curts=$group->curts()->whereStatus('accept')->whereType('primary')->latest()->get();
            $subjects=$group->subjects()->whereStatus('1')->latest()->get();
        }

        return view('admin.group.group_mission' ,compact(['user','group','curts','plans','subjects']));
    }
}
