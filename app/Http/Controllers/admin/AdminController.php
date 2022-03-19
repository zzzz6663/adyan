<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Curt;
use App\Models\Duty;
use App\Models\Plan;
use App\Models\User;
use App\Models\Group;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return redirect()->route('agent.all');
        return view('admin.index');
    }
    public function all_quiz()
    {
       $quizzes= DB::table('quiz_user')->orderBy('time','asc')->paginate(10);
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

        return view('curt.show', compact(['main_curt', 'all_curts', 'session']));
    }
    public function show_plan(Request $request, Plan $plan)
    {

        $session= session()->get('session');

        $main_plan = $plan;
        $all_plans = $plan->user->curts()->whereType('secondary')->latest()->get();

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
    public function verify_student(Request $request, User $user, Duty $duty)
    {
        //حساب دانسجو فعال شد
        $user->update([
            'verify' => '1'
        ]);
        // ثبت اپراتور و زمان
        $duty->update([
            'operator_id' => auth()->user()->id,
            'time' => Carbon::now()
        ]);

        // ثبت لاگ
        $user->save_log( ['admin', 'expert'],['type'=>'verify','operator_id'=>auth()->user()->id], true );
        $user->save_duty( [],['type'=>'student_go_quiz'], true);

        alert()->success(__('alert.a20'));
        return back();
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
            'status' =>'required',
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





           // ثبت لاگ
           if ($data['status'] != 'accept') {
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
            $plan->user->save_log(['admin', 'expert', 'list'=>[$plan->master_id,$plan->group_id]],
            [
                'type'=>'accept_plan',
                'group_id'=> $plan->group_id,
                'plan_id' =>$plan->id
            ]
            ,true );
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
        if ($user->level == 'expert') {
            $duty = Duty::whereType('verify_curt')->where('curt_id', $curt->id)->first();
            if ($duty) {
                $duty->update([
                    'operator_id' => auth()->user()->id,
                    'time' => Carbon::now()
                ]);
            }
        }
        if ($user->level == 'expert' && $user->operator_curts()->where('user_id',$curt->user->id)->count() > 0) {

            alert()->error(__('alert.a21'));
            return back();
        }
        if ($curt->side == 1) {
            alert()->error(__('alert.a22'));
            return back();
        }
        $valid = $request->validate([
            'title' => 'nullable',
            'tags' => 'nullable',
            'problem' => 'nullable',
            'question' => 'nullable',
            'necessity' => 'nullable',
            'innovation' => 'nullable',
            'master_id' => 'nullable|exists:users,id',
            'status' => 'required'
        ]);
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

            $user->save_duty( [],['type'=>'submit_plan'], true);
            $user->update_status('plan');
        }


        if (isset($valid['master_id'])) {
            $curt->update([
                'master_id' =>  $valid['master_id']
            ]);
            $curt->user->save_log( ['admin', 'expert'],
            [
                'type'=>'select_curt_master',
                'operator_id'=> auth()->user()->id,
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
}
