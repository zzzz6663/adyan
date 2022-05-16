<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',//  دانشجوی درخواست دهنده
        'expert_id',// استاد
        'master_id',// متخصص تایید کننده
        'change_group',//
        'change_master',//
        'change_guid',//
        'status',//
        'confirm_expert',//
        'confirm_master',//
        'request',//
        'oldgroup_id',//
        'newgroup_id',//
        'oldmaster_id',//
        'newmaster_id',//
        'oldguid_id',//
        'newguid_id',//
    ];
    // public function user(){
    //     return $this->belongsTo(User::class);
    // }
    // public function master(){
    //     return $this->belongsTo(User::class,'master_id');
    // }
    // public function expert(){
    //     return $this->belongsTo(User::class,'expert_id');
    // }
    // public function oldgroup(){
    //     return $this->belongsTo(Group::class,'oldgroup_id');
    // }
    // public function newgroup(){
    //     return $this->belongsTo(Group::class,'newgroup_id');
    // }
    // public function oldmaster(){
    //     return $this->belongsTo(User::class,'oldmaster_id');
    // }
    // public function newmaster(){
    //     return $this->belongsTo(User::class,'newmaster_id');
    // }
    // public function oldguid(){
    //     return $this->belongsTo(User::class,'oldguid_id');
    // }
    // public function newguid(){
    //     return $this->belongsTo(User::class,'newguid_id');
    // }
}
