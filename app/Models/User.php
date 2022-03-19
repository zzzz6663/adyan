<?php

namespace App\Models;

use Carbon\Carbon;
use Morilog\Jalali\Jalalian;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Mockery\Matcher\Subset;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $fillable = [
        'name',//نام
        'email',//ایمیل
        'password',//رمز عبور
        'family',//نام خانوادگی
        'level',//سطح کاربر مثلا دانشجو یا کارشناس
        'code',//کد کاربر
        'avatar',//عکس
        'group',//گروه
        'whatsapp',//شماه واتس اپ
        'mobile',// تلفن همراه
        'type_job',// نوع شغل
        'semat_job',// سمت شغل
        'job',// تایتل شغل
        'org',// سازمان
        'country_id',// کشور سکونت
        'city',// شهر سکونت
        'province',// استان سکوت
        'status',// وضعیت سطح  کاربر
        'verify',// تایید اطلاعات دانشجو
        'master_univer',// دانشگاه کارشناسی
        'master_course',//رشته کارشناسی
        'expert',// مهارت های استاد
        'course',// رشته تدریس استاد
        'complete',// کامل شدن ثبت نام
        'last_select_object_time',//زمان اخرین بازدید لیست موضوعات مصوب
    ];

    // register ثبت نام
    // verify تایید حساب

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function plan()
    {
        return $this->hasOne(plan::class);
    }
    public function plans()
    {
        return $this->hasMany(plan::class);
    }
    public function admin_plan()
    {
        return $this->hasOne(plan::class,'group_id');
    }
    public function master_plan()
    {
        return $this->hasOne(plan::class,'master_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subset::class);
    }
    public function group_subjects()
    {
        return $this->hasMany(Subset::class,'group_id');
    }
    public function master_subjects()
    {
        return $this->hasMany(Subset::class,'master_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function curt(){
        return $this->hasOne(Curt::class)->whereType('primary')->first();
    }
    public function duty(){
        return $this->hasOne(Duty::class);
    }
    public function operator_curts(){
        return $this->hasMany(Curt::class,'operator_id');
    }
    public function curts(){
        return $this->hasMany(Curt::class);
    }
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
    public function logs()
    {
        return $this->belongsToMany(Log::class);
    }

    public function log()
    {
        return $this->hasMany(Log::class);
    }
    public function operator_log()
    {
        return $this->hasMany(Log::class,'operator_id');
    }


    public function duties()
    {
        return $this->belongsToMany(Duty::class);
    }

    public function student_duty()
    {
        return $this->hasMany(Duty::class,'user_id');
    }
    public function operator_duty()
    {
        return $this->hasMany(Duty::class,'operator_id');
    }
    public function session()
    {
        return $this->hasOne(Session::class);
    }
    public function sessions()
    {
        return $this->belongsToMany(Sessions::class);
    }
    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class)->withPivot(['time','number','result']);
    }
    public function expert_quizzes()
    {
        return $this->hasMany(Quiz::class,'user_id');
    }
    public function questions()
    {
        return $this->belongsToMany(Question::class)->withPivot(['quiz_id','number','user_answer','question_answer']);
    }


    public function  avatar(){
        if($this->avatar){
            return  asset('/media/avatar/'.$this->avatar);
        }
        return false;
    }




//ثبت  وظیفه برای بعضی از کاربران
    public function save_duty($levels ,$options,$add=false )
    {
        $users_for_duty=User::whereIn('level',$levels)->get()->pluck('id')->toArray();
        // $duty= Duty::create([
        //      'user_id'=> $this->id,
        //      'type'=> $type,
        //      'operator_id'=> $operator,
        //      'curt_id'=> $curt,
        //      'subject_id'=> $subject,
        //      'group_id'=> $group,
        // ]);
        $list=null;
        if(array_key_exists('list',$levels)){
         $list=$levels['list'];
         unset($levels['list']);
        }
        $options['user_id']=$this->id;
        $duty=   $this->duty()->create($options);

        if($add){
            $users_for_duty[]=$this->id;
           }

           if(in_array('group',$levels) && $options['curt_id']){
            $curt= Curt::find( $options['curt_id']);
            $admin_group=$curt->group->admin();
             $users_for_duty[]= $admin_group->id;
            }
            if($list){
                $users_for_duty=array_unique(array_merge($users_for_duty,$list), SORT_REGULAR) ;
               }

        $duty->users()->syncWithoutDetaching($users_for_duty);
    }

    //ثبت لاگ  برای بعضی از کاربران
    public function  save_log($levels ,$options,$add=false )
    {
        // if(in_array('group',$levels)){
        //     dd(  $user->curt()->master());
        //    }
       $list=null;
       if(array_key_exists('list',$levels)){
        $list=$levels['list'];
        unset($levels['list']);
       }
        $users_for_log=User::whereIn('level',$levels)->get()->pluck('id')->toArray();
        $options['user_id']=$this->id;
        $log=   $this->log()->create($options);
    //     $log= Log::create([
    //         'user_id'=> $this->id,
    //         'type'=> $type,
    //         'operator_id'=> $operator,
    //         'curt_id'=> $curt,
    //         'subject_id'=> $subject,
    //         'group_id'=> $group,
    //    ]);

       if($add && !in_array($this->id,$users_for_log)){
        $users_for_log[]=$this->id;
       }
       if(in_array('group',$levels) && $options['curt_id']){
       $curt= Curt::find($options['curt_id']);
       $admin_group=$curt->group->admin();
        $users_for_log[]= $admin_group->id;
       }
       if($list){
        $users_for_log=array_unique(array_merge($users_for_log,$list), SORT_REGULAR) ;
       }

       $log->users()->syncWithoutDetaching($users_for_log);
    }
    public function update_status($status)
    {
       $this->update(['status'=>$status]);
    }
    public function check_quiz_pass()
    {
       return $this->quizzes()->wherePivot('result','1')->first();
    }
    public function persian_latest_falid_quiz()
    {
       return Jalalian::forge(Carbon::parse($this->quizzes()->whereResult('0')->latest()->first()->time)->addDays(21))->format('d-m-Y');
    }
    public function check_go_quiz()
    {
        if( $this->quizzes()->whereResult('0')->count()==0){
            return true;
        }
        if(! $this->quizzes()->whereResult('0')->latest()->first() ){
            return false;
        }
       return  Carbon::now()->diffInDays(Carbon::parse($this->quizzes()->whereResult('0')->latest()->first()->time))>=20??false;
    }


}
