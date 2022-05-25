<?php

namespace App\Models;

use Morilog\Jalali\Jalalian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'info_master',//توضیحات استاد راهنما برای رد طرح تفصیلی
        'confirm_master',//               تایید طرح توسط استاد
        'type',//  نوع که به اصلی و غیر اصلی
        'side',//اگر یک باشد یعنی دانشجو میتوانید ویرایش بزند و اگر یک باشد
        'note',//  یادداشت
        'concepts',// مفاهیم
        'goals',//اهداف
        'history',//پیشینه
        'down',//تاریخ تایید
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
    public function duties()
    {
        return $this->hasMany(Duty::class);
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
        return $this->belongsToMany(Session::class)->withPivot(['status','guid_id','master_id','title',]);
    }
    public function  report(){
        if($this->report){
            return  asset('/media/plan/'.$this->report);
        }
        return false;
    }
    public function surveys()
    {
        return $this->belongsToMany(Survey::class);
    }

    public function last_group_review()
    {
        // if ($this->group && $last_plan=$this->user->plans()->where('operator_id',$this->group->admin()->id)->latest()->first()){
        //     return   Jalalian::forge($last_plan->created_at)->format('Y-m-d');
        //   }
        return false;
    }
    public function last_edit_student()
    {
        if ($last_plan=$this->user->plans()->latest()->first()){
            return   Jalalian::forge($last_plan->created_at)->format('Y-m-d');
          }
        return false;
    }

}
