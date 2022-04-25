<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duty extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',//ای دی دانشجو
        'operator_id',// ای استاد یا کارشناس یا...
        'group_id',// کلید گروه
        'plan_id',// کلید طرح تفضیلی
        'type',//نوع وظیفه
        'info',//اطلاعات اضافه
        'down_id',//ای دی انجام دهنده
        'time',//زمان انجام
        'session_id',//  ای دی جلسه
        'curt_id',//  ای دی طرح اجمالی
        'subject_id',//  ای دی طرح موضوع
        'survey_id',//  ای دی نظرسنجی
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    public function student()
    {
        return $this->belongsTo(User::class,'user_id')->first();
    }
    public function down()
    {
        return $this->belongsTo(User::class,'down_id')->first();
    }
    public function operator()
    {
        return $this->belongsTo(User::class,'operator_id')->first();
    }
    public function curt()
    {
        return $this->belongsTo(Curt::class);
    }
    public function session()
    {
        return $this->belongsTo(Session::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
