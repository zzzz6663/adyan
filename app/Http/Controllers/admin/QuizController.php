<?php

namespace App\Http\Controllers\admin;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user=auth()->user();
        if( $user->level== 'expert'){
            $quizzes=  $user->expert_quizzes();
        }
        if( $user->level== 'admin'){
            $quizzes=Quiz::query();
            // $quizzes=  $user->expert_quizzes();
        }

        if ($request->search){
            $search=$request->search;
            $quizzes->where('name','LIKE',"%{$search}%");
        }
        // if($user->level=='expert'){
        //     $quizzes->where('user_id',$user->id);
        // }

        $quizzes=  $quizzes->latest()->paginate(10);
        return view('admin.quiz.all',compact(['quizzes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quiz.create');
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
            'title' => 'required|max:256',
            'duration' => 'required',
            'active' => 'required',
        ]);
        $user=auth()->user();
        if( $user->level!= 'expert'){
alert()->error(__('alert.a50'));
          return back();
        }
        $user=auth()->user();

        $user->expert_quizzes()->create($data);

        alert()->success(__('alert.a31'));
        return redirect()->route('quiz.index');
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
    public function edit(Quiz $quiz)
    {
      return view('admin.quiz.edit' ,compact(['quiz']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        $data = $request->validate([
            'title' => 'required|max:256',
            'duration' => 'required|',
            'active' => 'required',
        ]);
        $user=auth()->user();
        if( $user->level!= 'expert'){
            alert()->error(__('alert.a50'));
                      return back();
                    }
        $quiz->update($data);

        alert()->success(__('alert.a32'));
        return redirect()->route('quiz.index');
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
    public function default_quiz(Request $request)
    {
        $data= $request->validate(['quiz_id' => 'required']);
        $def=Quiz::where(['def' => 1]);
        if($def){
            $def->update(['def' =>0]);
        }
        $quiz=Quiz::find($data['quiz_id']);
        if($quiz){
            $quiz->update(['def'=>1]);

          alert()->success(__('alert.a46'));
        }else{
            alert()->error(__('alert.a47'));
        }

        return back();

    }
}
