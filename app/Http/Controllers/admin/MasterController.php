<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterController extends Controller
{
  public function groups()
  {
      $user=auth()->user();
      $groups=$user->groups;
    return view('admin.master.groups',compact(['groups']));
  }
}
