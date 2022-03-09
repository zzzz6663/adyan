<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
  public function dashboard()
  {

      $user=auth()->user();
      if($user->verify!=1){
          alert()->error(__('alert.a17'));
          return redirect()->route('logout');
      }
      return view('student.dashboard',compact('user'));
  }
  public function per_quiz(Request $request)
  {
      if($request->isMethod('post')){
          $user=auth()->user();


    $quiz=Quiz::has('questions', '>=', 10)->where('active','1')->inRandomOrder()->first();
    // ایجاد کلید واحد  برای هر آزمون
    $number=$user->quizzes()->count()+1;
   $user->quizzes()->attach(array($quiz->id => ['time' => Carbon::now(),'number'=> $number]));
   $questions=$quiz->questions()->inRandomOrder()->limit(5)->get();
   $user->questions()->attach($questions->pluck('id')->toArray(), ['number'=> $number,'quiz_id'=>$quiz->id]);
        return view('student.quiz',compact(['questions','number','quiz']));
      }
      return view('student.per_quiz');
  }
public function quiz_result(Request $request)
{
    $user=auth()->user();
    $quiz=Quiz::find($request->quiz_id);
    if( !$quiz){
        alert()->error(__('alert.a18'));
        return redirect(route('user.note'));
    }
    $correct=0;
    foreach($request->answer as $ke=>$val){
        $question=Question::find($ke);

        if($question->answer==$val){

            $correct++;
        }
        $user->questions()->where('question_id',$ke)->wherePivot('number',$request->number)->update(['user_answer'=>$val,'question_answer'=>$question->answer]);

    }
    $quiz_result=0;
    if( $correct <4){
        $user->quizzes()->wherePivot('number',$request->number)->update(['result'=>1]);
        $quiz_result=1;
        $duty=$user->duties()->whereType('student_go_quiz')->latest()->first();
        if( $duty){
            $duty->update(['time'=>Carbon::now()]);
        }
    }
    $total_question=$quiz->count();
    return view('student.result_quiz',compact(['correct','total_question','quiz_result']));
    // $res=$user->questions()->where('question_id','10')->wherePivot('number',$request->number)->update(['user_answer'=>1]);

}






}
