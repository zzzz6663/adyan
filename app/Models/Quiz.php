<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',// ای دی کارشناس یا سازنده ازمون
        'title',// نام
        'duration',// زمان هر سوال به ثانیه
        'active',//  نمایش به کاربر
        'def',//    آزمون پیش فرض
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot(['time','number','result']);
    }
    public function questions(){
        return $this->hasMany(Question::class);
    }


}
