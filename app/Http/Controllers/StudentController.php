<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Curt;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Subject;
use App\Models\Question;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function select_curt(Request $request)
    {


        $subject = Subject::find($request->subject);
        $user = auth()->user();


        if (!$subject) {
            alert()->error(__('alert.a40'));
            return back();
        }

        if ($user->status != 'quiz') {
            alert()->error(__('alert.a39'));
            return back();
        }
        if ($user->curt() ) {
            if($user->curt()->group_id){
                alert()->error(__('sentences.back_for_admin'));
                return back();
            }
            $user->duty()->where('type','verify_curt')->first()->delete();
            $user->curt()->update(['subject_id'=> $subject->id]);

        } else {
            Curt::create([
                'subject_id'=> $subject->id,
                'user_id'=>$user->id,
                'type'=>'primary',
            ]);
            $user->duties()->whereType('submit_curt')->first()->update(['subject_id', $subject->id,'time'=>Carbon::now()]);
            //  TODO  طرح تفضیلی
        }
        $subject->update(['user_id'=> $user->id]);
        $user->save_log( ['admin', 'expert','list'=>[ $subject->group->admin()->id,$subject->master->id]],
        [
            'type' =>'submit_subject',
            'subject_id' =>$subject->id
        ],
        true);
        $user->save_duty( [],['type'=>'submit_plan'], true);
        $user->update_status('plan');
        return redirect()->route('user.note');
    }
    public function subject_list(Request $request)
    {
        $data= $request->validate([  'tags' => 'required|array|between:1,5',]);
        $user = auth()->user();
        if (!$user->last_select_object_time) {
            $user->update(['last_select_object_time' => Carbon::now()]);
        } else {
            $diff = Carbon::parse($user->last_select_object_time)->diffInDays(Carbon::now());
            if ($diff < 20) {
                // alert()->error(__('alert.a41',  ['day'=>20-$diff]));
                // return back();
            } else {
                $user->update(['last_select_object_time' => Carbon::now()]);
            }
        }

        if($user->curt()){
            if($user->curt()->group_id ){
                alert()->error(__('sentences.back_for_admin'))->autoclose(8000);
                return back();
            }
        }
        // dd($data['tags']);
        // $subjects = Subject::withCount('tags')->whereStatus('1')->where('user_id', null)->orderBy('tags_count', 'asc')->limit(5)->get();
        $subjects = Subject::whereStatus('1')->whereHas('tags',function($query)  use($data){
            $query->where('id',$data['tags'][0]);
            if(sizeof($data['tags'])>1){
                for($i=1;$i<sizeof($data['tags']);$i++){
                    $query->orWhere('id',$data['tags'][$i]);

                }
            }

        //     $b=0;
        //    while(sizeof($data['tags'])){
        //     for($i=0;$i<sizeof($data['tags']);$i++){
        //         $query->orWhere('id',$data['tags'][$i]);

        //     }

        //     unset($data['tags'][$b]);
        //     if(sizeof($data['tags'])){
        //         break;
        //     }
        //     $b++;
        //    }
        })->where('user_id', null)->limit(5)->get();
        // foreach($subjects as $subject){
        //     dump($subject->id);
        //     dump($subject->tags()->pluck('tag')->toArray(),'_');
        // }
        // dd($subjects);
        return view('student.subject_list', compact(['subjects', 'user']));
    }
    public function dashboard()
    {

        $user = auth()->user();
        if ($user->verify != 1) {
            alert()->error(__('alert.a17'));
            return redirect()->route('logout');
        }
        return view('student.dashboard', compact('user'));
    }
    public function per_curt(Request $request)
    {
        $user = auth()->user();
        if ($user->status != 'quiz') {
            alert()->error(__('alert.a39'));
            return back();
        }
        return view('student.per_curt');
    }
    public function per_quiz(Request $request)
    {

        $user = auth()->user();
        // if ($user->status != null) {
        //     alert()->error(__('alert.a39'));
        //     return back();
        // }
        // if ($user->check_quiz_pass()) {
        //     alert()->error(__('alert.a34'));
        //     return back();
        // }
        // if(!$user->check_go_quiz()){
        //     alert()->error(__('alert.a35'));
        //     return back();
        // }
        if ($request->isMethod('post')) {
            $user = auth()->user();
            $quiz = Quiz::where('def','1')->first();
            if( ! $quiz){
                alert()->error(__('alert.a61'));
            }
            // ایجاد کلید واحد  برای هر آزمون
            $number = $user->quizzes()->count() + 1;
            $user->quizzes()->attach(array($quiz->id => ['time' => Carbon::now(), 'number' => $number]));
            $questions = $quiz->questions()->inRandomOrder()->limit(15)->get();
            $user->questions()->attach($questions->pluck('id')->toArray(), ['number' => $number, 'quiz_id' => $quiz->id]);
            return view('student.quiz', compact(['questions', 'number', 'quiz']));
        }
        return view('student.per_quiz');
    }
    public function quiz_result(Request $request)
    {
        $user = auth()->user();
        $quiz = Quiz::find($request->quiz_id);
        if (!$quiz) {
            alert()->error(__('alert.a18'));
            return redirect(route('user.note'));
        }
        $correct = 0;
        foreach ($request->answer as $ke => $val) {
            $question = Question::find($ke);
            if ($question->answer == $val) {
                $correct++;
            }
            $user->questions()->where('question_id', $ke)->wherePivot('number', $request->number)->update(['user_answer' => $val, 'question_answer' => $question->answer]);
        }
        $quiz_result = 0;

        if ($correct >= 10) {
            $user->quizzes()->wherePivot('number', $request->number)->update(['result' => 1]);
            $quiz_result = 1;
            $duty = $user->duties()->whereType('student_go_quiz')->latest()->first();
            if ($duty) {
                $duty->update(['time' => Carbon::now()]);

                $user->save_log(['admin', 'expert'],['type'=>'pass_quiz'] , true);
                $user->save_duty([],['type'=>'submit_curt'] , true);
            }
        }

        $total_question = $user->questions()->wherePivot('number', $request->number)->wherePivot('quiz_id', $quiz->id)->count();
        return view('student.result_quiz', compact(['correct', 'total_question', 'quiz_result']));
        // $res=$user->questions()->where('question_id','10')->wherePivot('number',$request->number)->update(['user_answer'=>1]);

    }
    public function my_thesis(Request $request)
    {
        $user=auth()->user();
        $logs=$user->logs()->latest()->get();
        $main_curt = $user->curt();
        $all_curts = $user->curts()->whereType('secondary')->latest()->get();
        $main_plan = $user->plan()->whereType('primary')->first();
        $all_plans = $user->plans()->whereType('secondary')->latest()->get();
        return view('admin.agent.show',compact(['user','logs','main_curt','all_curts','main_plan','all_plans']));
        // return view('student.my_thesis',compact(['user']));
    }
}
