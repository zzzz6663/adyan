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
        'type',//نوع وظیفه
        'info',//اطلاعات اضافه
        'down_id',//ای دی انجام دهنده
        'time',//زمان انجام
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function student()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function operator()
    {
        return $this->belongsTo(User::class,'operator_id');
    }
}
