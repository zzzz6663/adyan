<?php

namespace App\Models;

use Morilog\Jalali\Jalalian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Curt extends Model
{
    use HasFactory;
    // protected $primaryKey = ['user_id', 'operator_id','group_id','ostad_id','master_id'];
      // طرح اجمالی
    protected $fillable=[
        'user_id', // کلید دانشجو
        'operator_id', //  کسی ویرایش بر روی طرح میزند
        'group_id', //  کسی ویرایش بر روی طرح میزند
        'guid_id', // کلید استاد مشاور
        'master_id', // کلید  استاد که تویط مدیر گروه  انتخاب میشود
        'ostad_id', //کلید استاد که دانشجو از لیست انتخاب میکند
        'type', //نوع طرح که اصلی و فرعی است   اصلی برای دانشجو که ثبت میکند و فرعی برای استاد که تغغیر در خواست میکند
        'title', //عنوان طرح اجمالی
        'problem', //  فیلد بیان مساله
        'tag', // کلیمات کلیدی طرح
        'question', // فیلد کلمات کلیدی
        'necessity', // فیلد ضرورت
        'innovation', // فیلد جنبه نوآوری
        'ostad', //استاد پیشنهادی که جز لیست نبودن
        'side', //وضعیت انتظار ، اگر صفر باشه دانشجو باید صبر کند تا طرف مقابل  طرح  به سمت دانشجو بفرستد
        'resume',//رزومه استاد پیشنهادی که جز لیست نبوده
        'status',//وضعیت مرحله پایان نامه
        'subject_id',//      کلید موضوع مصوب
        'fail_reason',//          دلیل رد طرح در موقع ورود اطلاعات اولیه
        'down',//تاریخ تایید
       'history',//ااطلاعات گذشته
       'note'//  یادداشت

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function master()
    {
        return $this->belongsTo(User::class,'master_id')->first();
    }
    public function guid()
    {
        return $this->belongsTo(User::class,'guid_id');
    }
    public function operator_curts()
    {
        return $this->belongsTo(User::class,'operator_id')->first();
    }
    public function operator()
    {
        return $this->belongsTo(User::class,'operator_id');
    }

    public function duties()
    {
        return $this->hasMany(Duty::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function sessions()
    {
        return $this->belongsToMany(Session::class)->withPivot(['status','guid_id','master_id','title','down']);
    }
    public function ostad_a()
    {
        return $this->belongsTo(User::class,'ostad_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function surveys()
    {
        return $this->belongsToMany(Survey::class);
    }
    public function last_group_review()
    {
        if ($this->group && $last_curt=$this->user->curts()->where('operator_id',$this->group->admin()->id)->latest()->first()){
            return   Jalalian::forge($last_curt->created_at)->format('Y-m-d');
          }
        return false;

    }
    public function last_edit_student()
    {

        if ($last_curt=$this->user->curts()->latest()->first()){
            return   Jalalian::forge($last_curt->created_at)->format('Y-m-d');
          }
        return false;

    }

    public function  resume(){
        if($this->resume){
            return  asset('/media/curt/'.$this->resume);
        }
        return false;
    }
}
