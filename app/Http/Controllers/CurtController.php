<?php

namespace App\Http\Controllers;

use App\Models\Curt;
use Illuminate\Http\Request;

class CurtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $curts=Curt::query();
        if ($request->search){
            $search=$request->search;
            $curts->where('name','LIKE',"%{$search}%");
        }
        $curts=  $curts->latest()->paginate(10);
        return view('curt.all',compact(['curts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('curt.create');
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
            'title' => 'required',
            'tags' => 'required',

            'problem' => 'required',
            'question' => 'required',
            'necessity' => 'required',
            'innovation' => 'required',
            'ostad_id' => 'nullable',
            // 'ostad' => 'required_if:ostad_id,=,0',
            'ostad' => 'nullable',
            'resume' => 'nullable',

        ]);
        $user=auth()->user();

        $data['tags']=implode('_',$data['tags']);
        $data['ostad_id']=implode('_',$data['ostad_id']);
        $data['status']='progress';
        $data['user_id']=$user->id;
        $data['type']='primary';
        $data['side']='0';
        $curt = Curt::create($data);

        if ($request->hasFile('resume')) {
            $image = $request->file('resume');
            $name_img = 'resume_' . $curt->id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/media/curt/'), $name_img);
            $data['resume'] = $name_img;
            $curt->update([
                'resume'=>$data['resume']
            ]);
        }
        $user->update([
            'status'=>'curt'
        ]);




        alert()->success('طرح با موفقیت ثبت شد ');
        return redirect()->route('user.note');
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
    public function edit(Curt $curt)
    {

        return view('curt.edit' ,compact(['curt']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
