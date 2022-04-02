<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    public $fillable=[
        'user_id',//کلسید دانشجو
        'master_id',// کید استاد راهنما
        'guid_id', // کلید استاد مشاور
        'group_id',//کلید گروه بررسی طرح تفضیلی
        'title',// عنوان
        'en_title',//عنوان انگلیسی
        'en_tags',//کلیمات کلیدی انگلیسی
        'tags',//کلمات کلیدی
        'problem',//بیان مساله
        'necessity',//اهمیت و ضرورت
        'question',//سوال اصلی
        'sub_question',//سوالات فرعی
        'hypo',//فرضیه ها
        'theory',//نظریه های مورداستفاده
        'structure',//ساختار گزارش
        'method',//روش اجرای پژوهش
        'source',//منابع مورد استفاده
        'status',//وضعیت تکمیل
        'report',//  فایل مشابه ایران داک
        'time',//زمان برررسی
        'type',//  نوع که به اصلی و غیر اصلی
        'side',//اگر یک باشد یعنی دانشجو میتوانید ویرایش بزند و اگر یک باشد
    ];
    public function master(){
        return $this->belongsTo(User::class,'master_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function guid()
    {
        return $this->belongsTo(User::class,'guid_id');
    }
    public function admin_group(){
        return $this->belongsTo(User::class,'group_id');
    }
    public function log(){
        return $this->hasOne(Log::class);
    }
    public function duty(){
        return $this->hasOne(Duty::class);
    }
    public function group(){
        return $this->belongsTo(Group::class);
    }
    public function sessions()
    {
        return $this->belongsToMany(Session::class);
    }
    public function  report(){
        if($this->report){
            return  asset('/media/plan/'.$this->report);
        }
        return false;
    }
}
