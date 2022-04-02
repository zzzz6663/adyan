<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use NumberFormatter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        $users=  $users->latest()->paginate(10);
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
            'avatar' => 'required',
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
        $user->update([
            'avatar'=>$data['avatar']
        ]);
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

}
