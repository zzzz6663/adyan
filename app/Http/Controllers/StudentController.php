<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
  public function dashboard()
  {

      $user=auth()->user();
      if($user->verify!=1){
          alert()->success('حساب شما هنوز تایید نشده است ');
          return redirect()->route('logout');
      }
      return view('student.dashboard',compact('user'));
  }
}
