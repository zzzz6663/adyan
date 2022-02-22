<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Curt;
use App\Models\Duty;
use App\Models\Group;
use App\Models\Session;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
 public function index()
 {
     return redirect()->route('agent.all');
     return view('admin.index');
 }
 public function curt(Request $request)
 {
    $curts=Curt::query();
    if ($request->search){
        $search=$request->search;
        $curts->where('name','LIKE',"%{$search}%");
    }
    $curts=  $curts->where('type','primary')->latest()->paginate(10);

     return view('curt.all',compact(['curts']));
 }
 public function show_curt(Request $request,Curt $curt,Duty $duty)
 {
    $session=null;
    if($request->session){
        $session=Session::find($request->session);
    }
    //  ثبت اپراتور و زمان در وظیفه
    if( $duty){
        $duty->update([
            'operator_id'=>auth()->user()->id,
            'time'=>Carbon::now()
        ]);
    }
    $main_curt=$curt;
        $all_curts=$curt->user->curts()->whereType('secondary')->latest()->get();

     return view('curt.show',compact(['main_curt','all_curts','session']));
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
 public function save_curt_group(Curt $curt ,Request $request)
 {
    $user=auth()->user();

     // ثبت پایان وظیفه
    $duty= $user->operator_duty()->whereType('verify_curt')->where('curt_id',$curt ->id)->first();
    if( $duty){
        $duty->update([
            'operator_id'=>auth()->user()->id,
            'time'=>Carbon::now()
        ]);
    }


     $valid=$request->validate([
         'group_id'=>'required|exists:groups,id'
     ]);
     $curt->update($valid);
     $group=Group::find( $valid['group_id']);
     $admin= $group->admin();
     $curt->user->save_log('save_curt_group_by_expert', ['admin' ,'expert','group'], true ,auth()->user()->id,$curt->id);
     $ar=array();
     //اگر طرح در سمت دانشجو نبود یعنی تسکی باید برای مدیر گروه تعریف شود
     if(!$curt->side){
        $ar=['group'];
     }
     $curt->user->save_duty('review_curt_by_master', $ar,false,auth()->user()->id,$curt->id);


     alert()->success('گروه   با موفقیت انتخاب شد');
     return back();

 }
 public function verify_student(Request $request, User $user , Duty $duty)
 {
    //حساب دانسجو فعال شد
    $user->update([
        'verify'=>'1'
    ]);
    // ثبت اپراتور و زمان
    $duty->update([
        'operator_id'=>auth()->user()->id,
        'time'=>Carbon::now()
    ]);



// ثبت لاگ
    $user->save_log('verify', ['admin' ,'expert'], true ,auth()->user()->id);
    $user->save_duty('submit_curt', [],true);

     alert()->success('           حساب دانشجو فعال شد');
     return back();

 }
 public function admin_curt_submit(Curt $curt ,Request $request)
 {
    $user=auth()->user();
    // ثبت پایان وظیفه
    if($user->level=='expert'){
        $duty= $user->operator_duty()->whereType('verify_curt')->where('curt_id',$curt ->id)->first();
        if( $duty){
            $duty->update([
                'operator_id'=>auth()->user()->id,
                'time'=>Carbon::now()
            ]);
        }
    }
   if($user->level=='expert' && $user->operator_curts()->count()>0){
       alert()->error('
       شما فقط یک بار میتوانید بر روی طرح ویرایش بزنید
       ');
    return back();
   }
     if($curt->side==1){
         alert()->error('هنوز دانشجو  تغییرات لازم رو انجام نداده است');
         return back();
     }
     $valid=$request->validate([
        'title' => 'nullable',
        'tags' => 'nullable',
        'problem' => 'nullable',
        'question' => 'nullable',
        'necessity' => 'nullable',
        'innovation' => 'nullable',
        'master_id' => 'nullable|exists:users,id',
         'status'=>'required'
     ]);
    //  $valid['status']='progress';
     $valid['user_id']=$curt->user_id;
     $valid['type']='secondary';
     $valid['side']='1';
     $valid['operator_id']=$user->id;
     $new_curt= Curt::create($valid);


     $curt->update([
         'status'=>'edit_curt_by_student',
         'side'=>'1',

     ]);

// ثبت لاگ
 $curt->user->save_log('edit_curt_by_student', ['admin' ,'expert'], true ,auth()->user()->id,$curt->id);
 $curt->user->save_duty('edit_curt_by_student', [],true,auth()->user()->id,$curt->id);
     if(    isset( $valid['master_id'])){
        $curt->update([
            'master_id'=>  $valid['master_id']
        ]);
        $curt->user->save_log('select_curt_master', ['admin' ,'expert', 'group'], true ,auth()->user()->id,$curt->id);
     }
     if(    $valid['status']=='accept'){
        $curt->user->save_log('accept_curt', ['admin' ,'expert', 'group'], true ,auth()->user()->id,$curt->id);
     }


     if($request->session){
        $duty=$user->duties()->where('curt_id',$curt->id)->whereType('review_curt_by_master')->where('time',null)->latest()->first();
        if($user->level=='master' && $duty){
            $duty->update([
                'time'=>Carbon::now()
            ]);
        }
        $session=Session::find($request->session);
       $next_curt= $session->curts()->whereSide('0')->first();

       if($next_curt){
           alert()->success('طرح فعلی بررسی شد ');
        return redirect()->route('admin.show.curt',[$next_curt->id,'session'=>$session->id]);
       }
       alert()->success('    جلسه به اتمام رسید    ');
       return redirect()->route('user.note');

    }






     alert()->success('    با موفقیت ثبت  شد');
     return back();

 }


}
