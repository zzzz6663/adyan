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
        'curt_id',//  ای دی طرح اجمالی


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
}
