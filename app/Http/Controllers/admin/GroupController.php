<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Group ;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $groups=Group::query();
        if ($request->search){
            $search=$request->search;
            $groups->where('name','LIKE',"%{$search}%");
        }
        $groups=  $groups->latest()->paginate(10);
        return view('admin.group.all',compact(['groups']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.group.create');
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
            'name' => 'required',
            'user_id' => 'required',
            'masters' => 'required',
        ]);
        $group = Group::create($data);
        if (!in_array($data['user_id'], $data['masters']))
            {
                $data['masters'][] = $data['user_id'];
            }
        $group->users()->attach($data['masters']);
        alert()->success('گروه با موفقیت ساخته شد ');
        return redirect()->route('group.index');
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
    public function edit(Group $group)
    {
        return view('admin.group.edit' ,compact(['group']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $data = $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'masters' => 'required',
        ]);
        $group ->update($data);
        if (!in_array($data['user_id'], $data['masters']))
            {
                $data['masters'][] = $data['user_id'];
            }
        $group->users()->sync($data['masters']);
        alert()->success('گروه با موفقیت ساخته شد ');
        return redirect()->route('group.index');
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
