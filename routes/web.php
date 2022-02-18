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


Route::get('/','HomeController@index')->name('home.index') ;
Route::post('/signin','HomeController@signin')->name('user.signin') ;
Route::any('/register1','HomeController@register1')->name('user.register1') ;
Route::get('/import','HomeController@import') ;
Route::get('/login','HomeController@login')->name('login') ;
Route::get('/logout','HomeController@logout')->name('logout') ;




Route::group(['middleware' => ['role:super-admin']], function () {
    //
});

Route::middleware(['auth'])->group(function(){
    Route::any('/note','HomeController@note')->name('user.note') ;
});
Route::middleware(['auth','role:student|admin'])->group(function(){
    Route::any('/register2','HomeController@register2')->name('user.register2') ;
    Route::any('/register3','HomeController@register3')->name('user.register3') ;
    Route::any('/register4','HomeController@register4')->name('user.register4') ;
    Route::any('/register5','HomeController@register5')->name('user.register5') ;
    Route::any('/register6','HomeController@register6')->name('user.register6') ;
    Route:: get('/dashboard','StudentController@dashboard')->name('student.dashboard') ;
    Route::resource('curt', 'CurtController');
});

// Route::prefix('student')->middleware(['checkStudent','auth'])->namespace('student')->group(function(){
// //    Route::get('/dashboard','StudentController@dashboard')->name('student.dashboard');


// });











Route::prefix('admin')->namespace('admin')->middleware([ 'auth'])->group(function(){
    Route::get('/curt','AdminController@curt')->name('admin.curt');
    Route::get('/show_curt/{curt}','AdminController@show_curt')->name('admin.show.curt');
    Route::get('/verify_student/{user}','AdminController@verify_student')->name('admin.verify.student');
    Route::post('/save_curt_master/{curt}','AdminController@save_curt_master')->name('admin.save.curt.master');
    Route::post('/admin_curt_submit/{curt}','AdminController@admin_curt_submit')->name('admin.curt.submit');
    Route::resource('agent', 'AgentController');
    Route::resource('group', 'GroupController');
});

//Route::get('/', function () {
//    return view('welcome');
//});
