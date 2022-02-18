<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
            $users->where('name','LIKE',"%{$search}%");
        //  $users->where(function($query) use ($request){
        //     $search=$request->search;
        //            $query->where('code','LIKE',"%{$search}%");
        //    });
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
            'level' => 'required',
            'expert' => 'required',
        ]);

        $data['expert'] = implode('_', $data['expert']);



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
        alert()->success('کاربر با موفقیت ساخته شد ');
        return redirect()->route('agent.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            'level' => 'required',
            'expert' => 'required',
        ]);
        $user= $agent;

        $data['expert'] = implode('_', $data['expert']);

        $user->assignRole($data['level']);

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $name_img = 'avatar_' . $user->id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/media/avatar/'), $name_img);
            $data['avatar'] = $name_img;
        }
        $user ->update($data);

        alert()->success('کاربر با موفقیت به روز شد ');
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
