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


Route::get('/','HomeController@index') ;






Route::middleware(['auth'])->group(function(){
//    Route::resource('Article', 'ArticleController');

//    Route::post('/pay_meet/{user}','HomeController@pay_meet')->name('home.pay.meet');

});

Route::prefix('student')->middleware(['checkStudent','auth'])->namespace('student')->group(function(){
//    Route::get('/dashboard','StudentController@dashboard')->name('student.dashboard');



});











Route::prefix('admin')->namespace('admin')->middleware([ 'checkadmin','auth'])->group(function(){
    Route::get('/','AdminController@index')->name('admin.index');


});

//Route::get('/', function () {
//    return view('welcome');
//});
