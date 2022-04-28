<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Code;
use App\Models\Curt;
use App\Models\Duty;
use App\Models\Plan;
use App\Models\User;
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

        $plan=Plan::find(87);
        $plans=Plan::whereType('primary')->where(function ($query){$query->where('status','!=','accept')-> orWhere('status',null);})->where('side','0')->whereIn('group_id',[8])->get();
        dd( $plans);

    }
    public  function  clear()
    {
        Log::where('id', '>', 0)->delete();
        Duty::where('id', '>', 0)->delete();
        Curt::where('id', '>', 0)->delete();
        alert()->success(__('alert.a8'));
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
        if ($user) {
            Mail::to($user)->send(new VerifyEmail($user));
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

                        alert()->error(__('alert.a12'));
                        return  back();

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
        //                 alert()->error('حساب شما هنوز   تایید   نشده است');
        //                 return back();
        //             } else {
        //                 return  redirect()->route('user.note');
        //             }
        //             break;
        //         case 'admin':
        //             alert()->success('شما با  موفقیت  وارد حساب  خود شدید');;
        //             return redirect()->route('agent.index');
        //             break;
        //         case 'expert':
        //             alert()->success('شما با  موفقیت  وارد حساب  خود شدید');;
        //             return redirect()->route('user.note');
        //             break;
        //         case 'master':
        //             alert()->success('شما با  موفقیت  وارد حساب  خود شدید');;
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
                        return  back();

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
        } else {

            alert()->error(__('alert.a16'));
            return back();
        }
    }

    public  function  register1(Request $request)
    {

        $user = auth()->user();
        if ($user) {
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
                'avatar' => Rule::requiredIf(function () use ($user) {
                    return !$user->avatar();
                }),
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
                'email' => 'required|unique:users,email,' . $user->id,
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
            if ($user->complete == 0 && $user->direct=='1' ) {
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
        session()->put('locale', 'en');

        $user = auth()->user();
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

        Excel::import(new MastersImport, public_path('/masters1.xlsx'));
        return view('home.index');
    }
    public  function  lang(Request $request)
    {
        session()->put('locale', $request->lang);
        return redirect()->back();
    }
}
