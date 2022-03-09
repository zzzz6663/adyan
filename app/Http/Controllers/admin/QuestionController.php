<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Quiz $quiz)
    {
        $questions=$quiz->questions();
        if ($request->search){
            $search=$request->search;
            $questions->where('name','LIKE',"%{$search}%");
        }
        $questions=  $questions->latest()->paginate(10);
        return view('admin.quiz.question.all',compact(['questions','quiz']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Quiz $quiz)
    {
        return view('admin.quiz.question.create',compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,Quiz $quiz)
    {
        $data = $request->validate([
            'question' => 'required|max:256',
            'a1' => 'required|max:256',
            'a2' => 'required|max:256',
            'a3' => 'required|max:256',
            'a4' => 'required|max:256',
            'answer' => 'required|in:1,2,3,4',
        ]);
        $user=auth()->user();
        $quiz->questions()->create($data);

        alert()->success(__('alert.a29'));
        return redirect()->route('quiz.question.index',$quiz->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz ,Question $question )
    {
        return view('admin.quiz.question.edit',compact(['quiz','question']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Quiz $quiz ,Question $question )
    {
        $data = $request->validate([
            'question' => 'required|max:256',
            'a1' => 'required|max:256',
            'a2' => 'required|max:256',
            'a3' => 'required|max:256',
            'a4' => 'required|max:256',
            'answer' => 'required|in:1,2,3,4',
        ]);
        $user=auth()->user();
        $question->update($data);

        alert()->success(__('alert.a30'));
        return redirect()->route('quiz.question.index',$quiz->id);
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
