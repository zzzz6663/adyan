<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $fillable=[
        'group_id',// ای دی گروه
        'user_id',// ای دی دانشجو
        'operator_id',//ای دی استاد یا مدیر گروه یا متخصص
        'type',//نوع عمل انجام شده
        'info',//اطلاعات اضافی
        'session_id',//  ای دی جلسه
        'curt_id',//  ای دی طرح اجمالی
        'subject_id',// کلید موضوغ
        'plan_id',// کلید طرح تفضیلی
        'survey_id',//  ای دی نظرسنجی
        'shift_id',//  ای دی امور اداری

    ]
    ;

     public function users()
     {
         return $this->belongsToMany(User::class);
     }
     public function student()
     {
         return $this->belongsTo(User::class,'user_id')->first();
     }
     public function operator()
     {
         return $this->belongsTo(User::class,'operator_id')->first();
     }
     public function master()
     {
         return $this->belongsTo(User::class,'master_id')->first();
     }
     public function curt()
     {
         return $this->belongsTo(Curt::class);
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
     public function session()
     {
         return $this->belongsTo(Session::class);
     }
     public function shift()
     {
         return $this->belongsTo(Shift::class);
     }
}
