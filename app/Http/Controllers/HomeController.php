<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\User;
use Illuminate\View\View;
use App\Imports\CodesImport;
use App\Mail\VerifyEmail;
use App\Models\Curt;
use App\Models\Duty;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public  function  clear()
    {
        Log::where('id', '>', 0)->delete();
        Duty::where('id', '>', 0)->delete();
        Curt::where('id', '>', 0)->delete();
        alert()->success('تمام جداول با موفقیت پاک شدن');
        return back();


    }
    public  function  login()
    {
        return redirect()->route('home.index');
    }
    public  function  logout()
    {
        alert()->success('شما با موفقیت از حساب خود خارج شدید');
        Auth::logout();
        return redirect()->route('home.index');
    }
    public  function  forget_password(Request $request)
    {
        $valid = $request->validate([
            'email_forget' => 'required'
        ]);
        $user = User::whereEmail($request->email_forget)->first();
        if ($user) {
            Mail::to($user)->send(new VerifyEmail($user));
            alert()->success('رمز عبور شما با موفقیت ارسال شد ');
        } else {
            alert()->error('ایمیل وارد صیحی نمی باشد ');
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



        if( $user){
            switch ($user->level) {
                case 'student':
                    if ($user->verify != 1) {
                        alert()->error('حساب شما هنوز   تایید   نشده است');
                        return back();
                    } else {
                        return  redirect()->route('user.note');
                    }
                    break;
                case 'admin':
                    alert()->success('شما با  موفقیت  وارد حساب  خود شدید');;
                    return redirect()->route('agent.index');
                    break;
                case 'expert':
                    alert()->success('شما با  موفقیت  وارد حساب  خود شدید');;
                    return redirect()->route('user.note');
                    break;
                case 'master':
                    alert()->success('شما با  موفقیت  وارد حساب  خود شدید');;
                    return redirect()->route('user.note');
                    break;
            }
        }


        return view('home.index');
    }
    public function signin(Request $request)
    {
        $user = User::whereEmail($request->username)->first();
        if ($user && $user->password == $request->password) {
            Auth::loginUsingId($user->id, true);
            switch ($user->level) {
                case 'student':
                    if ($user->verify != 1) {
                        alert()->error('حساب شما هنوز   تایید   نشده است');
                        return back();
                    } else {
                        return  redirect()->route('user.note');
                    }
                    break;
                case 'admin':
                    alert()->success('شما با  موفقیت  وارد حساب  خود شدید');;
                    return redirect()->route('agent.index');
                    break;
                case 'expert':
                    alert()->success('شما با  موفقیت  وارد حساب  خود شدید');;
                    return redirect()->route('user.note');
                    break;
                case 'master':
                    alert()->success('شما با  موفقیت  وارد حساب  خود شدید');;
                    return redirect()->route('user.note');
                    break;
            }
            return  redirect()->route('agent.create');
        } else {
            alert()->error('اطلاعات وارد شده صحیح نمیباشد');
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
                        alert()->error('شما قبلا ثیت نام کرده اید');
                        return redirect()->route('home.index');
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

            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $name_img = 'avatar_' . $user->id . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/media/avatar/'), $name_img);
                $data['avatar'] = $name_img;
            }
            $user->update($data);
            alert()->success('اطلاعات با موفقیت ثبت شد ');
            return redirect()->route('user.register3');
        }
        return view('home.register.level2', compact(['user']));
    }
    public  function  register3(Request $request)
    {
        $user = auth()->user();
        if ($request->isMethod('post')) {

            $data = $request->validate([
                'mobile' => 'required|unique:users,mobile,' . $user->id,
                'whatsapp' => 'required|unique:users,whatsapp,' . $user->id,
                'email' => 'required|unique:users,email,' . $user->id,
            ]);
            $user->update($data);
            alert()->success('اطلاعات با موفقیت ثبت شد ');
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
                'job' => 'nullable',
                'org' => 'nullable',
                'country_id' => 'required',
                'city' => 'required',
                'province' => 'required',
                'master_univer' => 'required',
                'master_course' => 'required',
            ]);
            $user->update($data);
            alert()->success('اطلاعات با موفقیت ثبت شد ');
            return redirect()->route('user.register5');
        }
        return view('home.register.level4', compact(['user']));
    }
    public  function  register5(Request $request)
    {
        $user = auth()->user();
        if ($request->isMethod('post')) {
            $data = $request->validate([
                'password' => 'required|confirmed',
            ]);
            if ($user->complete == 0) {
                $user->save_log('register', ['admin', 'expert'], true);
                $user->save_duty('register', ['admin', 'expert']);
            }
            $data['complete'] = 1;
            $user->update($data);
            alert()->success('اطلاعات با موفقیت ثبت شد ');
            return redirect()->route('user.register6');
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
        $logs = $user->logs()->latest()->get();
        $duties = $user->duties()->latest()->get();
        return view('home.note', compact(['user', 'logs', 'duties']));
    }
    public  function  import()
    {

        Excel::import(new CodesImport, public_path('/d.xlsx'));
        return view('home.index');
    }
}
