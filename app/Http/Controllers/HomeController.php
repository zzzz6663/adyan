<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Code;
use App\Models\Curt;
use App\Models\Duty;
use App\Models\Plan;
use App\Models\Quiz;
use App\Models\User;
use App\Mail\UserMessage;
use App\Mail\VerifyEmail;
use Illuminate\View\View;
use App\Imports\CodesImport;
use Illuminate\Http\Request;
use App\Imports\MastersImport;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    public  function  aa()
    {
        Auth::loginUsingId(5, true);
        // $master=User::find(1965);
        // $curt=Curt::find(411);
        // $curt->group->admin()->save_duty( [],[
        //     'type'=>'define_guid',
        //     'curt_id' =>$curt->id,
        //     ]
        // , true);
        $plan=Plan::find(104);
        // $plan->user->save_duty( ['list'=>[ $plan->master->id]],['type'=>'verify_plan_by_master','plan_id'=>$plan->id],false);
        // $plan->user->save_duty( ['list'=>[ $plan->master->id]],['type'=>'verify_plan_by_master','plan_id'=>$plan->id],false);
        // $qu=User::whereCode('991351946')->first();
        // dump( $qu->primary_plan()->update(["confirm_master" => "1"]));
        // $qu=User::whereCode('61922')->first();
        // $qu=auth()->user();
        // $qu->save_duty( [],[
        //     'type'=>'define_guid',
        //     'curt_id' =>76
        //     ]
        // , true);

        // $qu->save_duty( [],
        // [
        //     'type' =>'edit_plan_by_student',
        //     'operator_id'=>auth()->user()->id,
        //     'plan_id' =>$qu->primary_plan()->id
        // ],true);
        // $qu->save_duty( [],['type'=>'submit_plan'], true);
        // $qu->update_status('plan');
        // $qu->duties()->delete();
        // $qu->logs()->whereType('pass_quiz')->delete();
        // $qu->save_duty( [],['type'=>'student_go_quiz'], true);
        // $q=Quiz::find(11);
        // $quiz= $q->users()->get();
        //     foreach  ($quiz as $qu){
        //         $qu->duties()->delete();
        //         $qu->logs()->whereType('pass_quiz')->delete();
        //         $qu->save_duty( [],['type'=>'student_go_quiz'], true);
        //     }
    //    dd($dd->count());
        // session()->put('locale', 'en');
    //  $ddd=Plan::where('type','primary')->where('confirm_master','=','1')->get();
    //     // $ddd=Plan::where('type','primary')->get();
    //    foreach  ($ddd as $user){
    //     if($user->status==null){
    //         dump($user->update(['confirm_master'=>'0']));
    //     }
    //    }
    //    dump($ddd->count());

    }
    public  function  clear()
    {
        // Log::where('id', '>', 0)->delete();
        // Duty::where('id', '>', 0)->delete();
        // Curt::where('id', '>', 0)->delete();
        // alert()->success(__('alert.a8'));
        $exitCode = Artisan::call('optimize');
        return back();


    }
    public  function  login()
    {


        Auth::logout();

        // $duty=$user->duties()->whereType('submit_curt')->first();
        // dd(  $duty);






        return view('home.index');
        // return redirect()->route('home.index');
    }
    public  function  logout()
    {
        alert()->success(__('alert.a9'));
        Auth::logout();
        return redirect()->route('login');
    }
    public  function  forget_password(Request $request)
    {

        $valid = $request->validate([
            'email_forget' => 'required'
        ]);
        $user = User::whereEmail($request->email_forget)->first();
        $title='?????? ???????? ??????';
        $message="?????? ???????? ??????:".  $user ->password;
        if ($user) {
            Mail::to($user)->send(new UserMessage($message,$title));
            alert()->success(__('alert.a10'));
        } else {
            alert()->error(__('alert.a11'));
        }
        return back();
    }
    public  function  index()
    {
        //   Mail::to($user)->send(new SampleEmail($user));
        //     $user=User::find(17);
        // Mail::to($user)->send(new VerifyEmail($user));
        // $role = Role::create(['name' => 'admin']);
        // Auth::logout();
        // Auth::loginUsingId(5);
        $user = auth()->user();
        // $duty=$user->duties()->whereType('submit_curt')->first();
        // dd(  $duty);
        if (auth()->check()) {
            $user= auth()->user();

            switch ($user->level) {
                case 'student':

                    if ($user->verify != 1) {

                        // alert()->error(__('alert.a12'));
                        // return  back();

                    } else {

                        return  redirect()->route('user.note');
                    }
                    break;
                case 'admin':
                    alert()->success(__('alert.a13'));
                    return redirect()->route('agent.index');
                    break;
                case 'expert':
                    alert()->success(__('alert.a13'));
                    return redirect()->route('user.note');
                    break;
                case 'master':
                    alert()->success(__('alert.a13'));
                    return redirect()->route('user.note');
                    break;
            }
            // return  redirect()->route('agent.create');
        }

        // if( $user){
        //     switch ($user->level) {
        //         case 'student':
        //             if ($user->verify != 1) {
        //                 alert()->error('???????? ?????? ????????   ??????????   ???????? ??????');
        //                 return back();
        //             } else {
        //                 return  redirect()->route('user.note');
        //             }
        //             break;
        //         case 'admin':
        //             alert()->success('?????? ????  ????????????  ???????? ????????  ?????? ????????');;
        //             return redirect()->route('agent.index');
        //             break;
        //         case 'expert':
        //             alert()->success('?????? ????  ????????????  ???????? ????????  ?????? ????????');;
        //             return redirect()->route('user.note');
        //             break;
        //         case 'master':
        //             alert()->success('?????? ????  ????????????  ???????? ????????  ?????? ????????');;
        //             return redirect()->route('user.note');
        //             break;
        //     }
        // }


        return view('home.index');
    }
    public function signin(Request $request)
    {
        $user = User::whereEmail($request->username)->first();
        if(!$user ){
            $user = User::whereCode($request->username)->first();
        }

        if ($user && $user->password == $request->password) {
            Auth::loginUsingId($user->id, true);

            switch ($user->level) {
                case 'student':
                    if ($user->verify != 1) {

                        alert()->error(__('alert.a12'));


                    } else {

                        return  redirect()->route('user.note');
                    }
                    break;
                case 'admin':
                    alert()->success(__('alert.a13'));
                    return redirect()->route('agent.index');
                    break;
                case 'expert':
                    alert()->success(__('alert.a13'));
                    return redirect()->route('user.note');
                    break;
                case 'master':
                    alert()->success(__('alert.a13'));
                    return redirect()->route('user.note');
                    break;
            }
            return redirect()->back();
        } else {

            alert()->error(__('alert.a16'));
            return  redirect()->route('login');
        }
    }

    public  function  register1(Request $request)
    {

        $user = auth()->user();
        if ($user) {
            if($user->level == 'student') {
                $user->assignRole('student');
                Auth::loginUsingId($user->id, true);
            }
            return redirect()->route('user.register2');
        }

        if ($request->isMethod('post')) {
            if ($request->yes) {
                $code = Code::whereCode($request->code)->firstOrFail();
                if (!User::whereCode($request->code)->first()) {
                    $user = User::create([
                        'name' => $code->family,
                        'family' => $code->name,
                        'code' => $code->code,
                        'level' => 'student'
                    ]);
                    $user->assignRole('student');
                    Auth::loginUsingId($user->id, true);
                } else {
                    $user = User::whereCode($request->code)->first();
                    if ($user->complete == 1) {
                        alert()->error(__('alert.a14'));

                        return redirect()->route('login');
                    } else {
                        Auth::loginUsingId($user->id, true);
                    }
                }
                return redirect()->route('user.register2');
            }
            $data = $request->validate([
                'code' => 'required|string|exists:codes,code'
            ]);
            $code = Code::whereCode($data['code'])->firstOrFail();

            return redirect()->route('user.register1', ['code' => $code->code, 'confirm' => 1]);
        }
        return view('home.register.level1');
    }
    public  function  register2(Request $request)
    {
        $user = auth()->user();
        if ($request->isMethod('post')) {
            $data = $request->validate([
                // 'avatar' => Rule::requiredIf(function () use ($user) {
                //     return !$user->avatar();
                // }),

                'avatar' => 'required',
                'group' => 'required',
                // 'whatsapp'=>'required',
                // 'mobile'=>'required',
                // 'type_job'=>'required',
                // 'semat_job'=>'required',
                // 'job'=>'required',
                // 'org'=>'required',
                // 'country_id'=>'required',
                // 'city'=>'required',
                // 'province'=>'required',
                // 'master_univer'=>'required',
                // 'master_course'=>'required',
                // 'password'=>'required|min:6',
            ]);

            $ava = $request->validate([
                'avatar' =>'nullable|max:500'
            ]);
            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $name_img = 'avatar_' . $user->id . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/media/avatar/'), $name_img);
                $data['avatar'] = $name_img;
            }
            $user->update($data);

            alert()->success(__('alert.a15'));
            return redirect()->route('user.register3');
        }
        return view('home.register.level2', compact(['user']));
    }
    public  function  register3(Request $request)
    {
        $user = auth()->user();
        if ($request->isMethod('post')) {

            $data = $request->validate([
                'mobile' => 'nullable|unique:users,mobile,' . $user->id,
                'whatsapp' => 'required|unique:users,whatsapp,' . $user->id,
                'email' => 'required|email|unique:users,email,' . $user->id,
            ]);
            $user->update($data);

            alert()->success(__('alert.a15'));
            return redirect()->route('user.register4');
        }
        return view('home.register.level3', compact(['user']));
    }
    public  function  register4(Request $request)
    {
        $user = auth()->user();
        if ($request->isMethod('post')) {
            $data = $request->validate([
                'type_job' => 'required',
                'semat_job' => 'required',
                'job' => 'required',
                'org' => 'required',
                'country_id' => 'required',
                'city' => 'required',
                'province' => 'required',
                'master_univer' => 'required',
                'master_course' => 'required',
            ]);
            $user->update($data);

            alert()->success(__('alert.a15'));
            return redirect()->route('user.register5');
        }
        return view('home.register.level4', compact(['user']));
    }
    public  function  register5(Request $request)
    {
        $user = auth()->user();
        if($user->level=='admin'){
            return redirect()->route('agent.index');
        }
        if ($request->isMethod('post')) {
            $data = $request->validate([
                'password' => 'required|confirmed',
            ]);
            if ($user->complete == 0 && $user->direct=='1'  && !$user->curt()) {
                $user->save_log(['admin', 'expert'],['type'=>'register'] , true);
                $user->save_duty(['admin', 'expert'],['type'=>'register'] );
            }
            $data['complete'] = 1;
            $user->update($data);

            alert()->success(__('alert.a15'));
            if($user->direct=='1' ){
                return redirect()->route('user.register6');
            }else{
                return redirect()->route('user.note');
            }
        }
        return view('home.register.level5', compact(['user']));
    }
    public  function  register6(Request $request)
    {
        $user = auth()->user();

        return view('home.register.level6', compact(['user']));
    }



    public  function  note(Request $request)
    {

        $user = auth()->user();

    //    foreach ($user ->quizzes()->orderBy('pivot_time', 'desc')->get() as $quiz){
    //     dump($quiz->pivot->time);
    //    }
        if($user ->level =='student' && $user->complete ==0 ){
            alert()->success(__('alert.a53'));
            return redirect()->route('user.register2');
        }
        $logs = $user->logs()->latest()->take(10)->get();
        $duties = $user->duties()
        ->where('time',null)->latest()->get();
        return view('home.note', compact(['user', 'logs', 'duties']));
    }
    public  function  import()
    {

        Excel::import(new MastersImport, public_path('/payan.xlsx'));
        // return view('home.index');
    }
    public  function  lang(Request $request)
    {
        session()->put('locale', $request->lang);
        alert()->success('language changed');
        return redirect()->back();
    }
}
