<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Curt;
use App\Models\User;
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
 public function show_curt(Curt $curt)
 {


     return view('curt.show',compact(['curt']));
 }
 public function save_curt_master(Curt $curt ,Request $request)
 {
     $valid=$request->validate([
         'master_id'=>'required'
     ]);
     $curt->update($valid);
     alert()->success('استاد راهنما با موفقیت انتخاب شد');
     return back();

 }
 public function verify_student(User $user ,Request $request)
 {
    $user->update([
        'verify'=>'1'
    ]);

     alert()->success('           حساب دانشجو فعال شد');
     return back();

 }
 public function admin_curt_submit(Curt $curt ,Request $request)
 {
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
         'status'=>'required'
     ]);
     $valid['status']='progress';
     $valid['user_id']=$curt->user_id;
     $valid['type']='secondary';
     $valid['side']='1';
     $new_curt= Curt::create($valid);
     alert()->success('    با موفقیت ثبت  شد');
     return back();

 }


}
