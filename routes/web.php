<?php

use App\Http\Middleware\checkTeacher;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes`
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/admin_login','HomeController@admin_login')->name('admin.login');

Route::group(['middleware' => ['check_language']], function () {
    Route::get('/clear','HomeController@clear')->name('home.clear') ;
    Route::get('/','HomeController@index')->name('login') ;
    Route::post('/signin','HomeController@signin')->name('user.signin') ;
    Route::any('/register1','HomeController@register1')->name('user.register1') ;
    Route::get('/import','HomeController@import') ;
    Route::get('/login','HomeController@login') ;
    Route::get('/logout','HomeController@logout')->name('logout') ;
    Route::post('/forget_password','HomeController@forget_password')->name('forget.password') ;
    Route::get('/lang','HomeController@lang')->name('lang') ;

});






Route::group(['middleware' => ['role:super-admin']], function () {
    //
});

Route::middleware(['auth','check_language'])->group(function(){
    Route::any('/note','HomeController@note')->name('user.note') ;
});
Route::middleware(['auth','role:student|admin','check_language'])->group(function(){
    Route::any('/register2','HomeController@register2')->name('user.register2') ;
    Route::any('/register3','HomeController@register3')->name('user.register3') ;
    Route::any('/register4','HomeController@register4')->name('user.register4') ;
    Route::any('/register5','HomeController@register5')->name('user.register5') ;
    Route::any('/register6','HomeController@register6')->name('user.register6') ;
    Route:: get('/dashboard','StudentController@dashboard')->name('student.dashboard') ;
    Route:: any('/per_quiz','StudentController@per_quiz')->name('student.per.quiz') ;
    Route:: get('/per_curt','StudentController@per_curt')->name('student.per.curt') ;
    Route:: post('/select_curt','StudentController@selenotct_curt')->name('student.select.curt') ;
    Route:: post('/subject_list','StudentController@subject_list')->name('student.subject.list') ;
    Route:: post('/quiz_result','StudentController@quiz_result')->name('student.quiz.result') ;
    Route::resource('curt', 'CurtController');
    Route::resource('plan', 'PlanController');
});

// Route::prefix('student')->middleware(['checkStudent','auth'])->namespace('student')->group(function(){
// //    Route::get('/dashboard','StudentController@dashboard')->name('student.dashboard');


// });











Route::prefix('admin')->namespace('admin')->middleware([ 'auth'])->group(function(){
    Route::get('/curt','AdminController@curt')->name('admin.curt');
    Route::get('/show_curt/{curt}/{duty?}','AdminController@show_curt')->name('admin.show.curt');
    Route::get('/show_plan/{plan}/{duty?}','AdminController@show_plan')->name('admin.show.plan');
    Route::get('/verify_student/{user}/{duty}','AdminController@verify_student')->middleware(['role:expert'])->name('admin.verify.student');
    Route::post('/admin_curt_submit/{curt}','AdminController@admin_curt_submit')->middleware(['role:expert|master'])->name('admin.curt.submit');
    Route::post('/admin_plan_submit/{plan}','AdminController@admin_plan_submit')->middleware(['role:expert|master'])->name('admin.plan.submit');
    Route::get('/all_quiz','AdminController@all_quiz')->middleware(['role:expert|admin'])->name('admin.all.quiz');
    Route::post('/save_curt_master/{curt}','AdminController@save_curt_master')->middleware(['role:master'])->name('admin.save.curt.master');
    Route::post('/save_curt_group/{curt}','AdminController@save_curt_group')->middleware(['role:expert'])->name('admin.save.curt.group');
    Route::resource('agent', 'AgentController')->middleware(['role:admin']);
    Route::resource('group', 'GroupController')->middleware(['role:admin']);
    //
    Route::resource('quiz', 'QuizController')->middleware(['role:expert']);
    Route::resource('quiz.question', 'QuestionController')->middleware(['role:expert']);
});

Route::prefix('master')->namespace('admin')->middleware([ 'auth'])->group(function(){
    Route::get('/groups','MasterController@groups')->name('master.groups')->middleware(['role:master']);
    Route::resource('session', 'SessionController')->middleware(['role:master']);
    Route::resource('subject', 'SubjectController')->middleware(['role:master']);

});

//Route::get('/', function () {
//    return view('welcome');
//});
