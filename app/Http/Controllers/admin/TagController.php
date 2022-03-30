<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user= auth()->user();
        $tags=Tag::query();
        if ($request->search){
            $search=$request->search;
            $tags->where('name','LIKE',"%{$search}%");
        }
        $tags=  $tags->where('user_id', $user->id)->latest()->paginate(10);
        return view('admin.tags.all',compact(['tags']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user= auth()->user();
        return view('admin.tags.create',compact(['user']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate(['tag' =>'required|max:256|min:3']);
        $user= auth()->user();
        $user->tags()->create($data);
        alert()->success(__('alert.a48'));
        return redirect()->route('tag.index');

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
    public function edit(Tag $tag)
    {
        $user= auth()->user();
        return view('admin.tags.edit',compact(['user','tag']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $data=$request->validate(['tag' =>'required|max:256|min:3']);
        $user= auth()->user();
        $tag->update($data);
        alert()->success(__('alert.a49'));
        return redirect()->route('tag.index');
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
