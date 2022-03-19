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
      
        $quizzes=Quiz::query();
        if ($request->search){
            $search=$request->search;
            $quizzes->where('name','LIKE',"%{$search}%");
        }
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
        $user->quizzes()->create($data);

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
}
