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
        'change_group',//تغییر گروه
        'change_master',//  تغییر استاد راهنما
        'change_guid',//تغییر استاد مشاور
        'change_title',//تغییر تایتل
        'status',//  وضعیت
        'confirm_expert',//تایید  متخصص
        'confirm_master',// تایید استاد
        'request',//متن درخواست
        'down',//تمام شده : صفر منفی و یک مثبت
        'oldtitle',//
        'newtitle',//
        'oldgroup_id',//
        'newgroup_id',//
        'oldmaster_id',//
        'newmaster_id',//
        'oldguid_id',//
        'newguid_id',//
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function master(){
        return $this->belongsTo(User::class,'master_id');
    }
    public function expert(){
        return $this->belongsTo(User::class,'expert_id');
    }
    public function oldgroup(){
        return $this->belongsTo(Group::class,'oldgroup_id');
    }
    public function newgroup(){
        return $this->belongsTo(Group::class,'newgroup_id');
    }
    public function oldmaster(){
        return $this->belongsTo(User::class,'oldmaster_id');
    }
    public function newmaster(){
        return $this->belongsTo(User::class,'newmaster_id');
    }
    public function oldguid(){
        return $this->belongsTo(User::class,'oldguid_id');
    }
    public function newguid(){
        return $this->belongsTo(User::class,'newguid_id');
    }
    public function duties()
    {
        return $this->hasMany(Duty::class);
    }
    public function logs()
    {
        return $this->hasMany(logs::class);
    }
}
