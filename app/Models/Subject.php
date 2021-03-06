<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable=[
        'master_id', // کلید استاد سازنده موضوغ یا استاد راهنما جدید
        'old_master_id', // کلید استاد سازنده موضوع
        'group_id', // کلید گروه تایید کننیده موضوع
        'user_id', // کلید دانشجو انتخاب کننیده موضوع
        'admin_id', // گروه تایید کنتده موضوع
        'title', // عنوان موضوغ
        'status', // وضعیت موضوع
        'time', // وقت تایید موضوع
        'info', //توضیحات
        'reason', //دلیل رد
    ];
   public function user(){
       return $this->belongsTo(User::class);
   }
   public function group(){
       return $this->belongsTo(Group::class);
   }
   public function admin(){
       return $this->belongsTo(User::class,'admin_id');
   }
   public function master(){
       return $this->belongsTo(User::class,'master_id');
   }
   public function old_master(){
       return $this->belongsTo(User::class,'old_master_id');
   }
   public function sessions()
    {
        return $this->belongsToMany(Session::class);
    }
   public function duty()
    {
        return $this->hasOne(Duty::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
