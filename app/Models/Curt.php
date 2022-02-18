<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curt extends Model
{
    use HasFactory;

      // طرح اجمالی
    protected $fillable=[
        'user_id', // کلید دانشجو
        'editor_id', //  کسی ویرایش بر روی طرح میزند
        'master_id', // کلید  استاد که تویط مدیر گروه  انتخاب میشود
        'ostad_id', //کلید استاد که دانشجو از لیست انتخاب میکند
        'type', //نوع طرح که اصلی و فرعی است   اصلی برای دانشجو که ثبت میکند و فرعی برای استاد که تغغیر در خواست میکند
        'title', //عنوان طرح اجمالی
        'problem', //  فیلد بیان مساله
        'tags', // کلیمات کلیدی طرح
        'question', // فیلد کلمات کلیدی
        'necessity', // فیلد ضرورت
        'innovation', // فیلد جنبه نوآوری
        'ostad', //استاد پیشنهادی که جز لیست نبودن
        'side', //وضعیت انتظار ، اگر صفر باشه دانشجو باید صبر کند تا طرف مقابل  طرح  به سمت دانشجو بفرستد
        'resume',//رزومه استاد پیشنهادی که جز لیست نبوده
        'status',//وضعیت مرحله پایان نامه
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function master()
    {
        return $this->belongsTo(User::class,'master_id');
    }

}
