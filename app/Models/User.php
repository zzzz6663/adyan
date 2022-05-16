<?php

namespace App\Models;
use Carbon\Carbon;
use App\Models\Plan;
use NumberFormatter;
use App\Models\Subject;
use Morilog\Jalali\Jalalian;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'direct',//     روش ثبت نام  که استاد که اگر یک باشد یعنی کاربر خودشثبتنام کرده و اگر صفر باشد یعنی توسط مدیرثبت نام شده
        'complete',// کامل شدن ثبت نام
        'last_select_object_time',//زمان اخرین بازدید لیست موضوعات مصوب
        'defend',// دفاع کرده یا نکرده
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
        return $this->hasOne(plan::class) ;;
    }
    public function primary_plan()
    {
        return $this->hasOne(plan::class)->whereType('primary')->first();
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
    public function guid_plan()
    {
        return $this->hasOne(plan::class,'guid_id');
    }
    public function guid_curt()
    {
        return $this->hasOne(Curt::class,'curt_id');
    }
    public function guid_plans()
    {
        return $this->hasMany(plan::class,'guid_id');
    }
    public function guid_curts()
    {
        return $this->hasMany(Curt::class,'guid_id');
    }
    public function master_plans()
    {
        return $this->hasMany(plan::class,'master_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
    public function group_subjects()
    {
        return $this->hasMany(Subject::class,'group_id');
    }
    public function master_subjects()
    {
        return $this->hasMany(Subject::class,'master_id');
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
    public function tags(){
        return $this->hasMany(Tag::class);
    }
    public function operator_curts(){
        return $this->hasMany(Curt::class,'operator_id');
    }
    public function curts(){
        return $this->hasMany(Curt::class);
    }
    public function master_curts(){
        return $this->hasMany(Curt::class,'master_id');
    }
    public function curt_master_not_defend_count(){
        return $this->master_curts()->whereType('primary')->whereHas('user',function($query){
            $query->whereDefend('0');
        })->count();
    }

    public function curt_master_count(){
        return $this->master_curts()->whereType('primary')->count();
    }
    public function curt_guid_not_defend_count(){
        return $this->guid_curts()->whereType('primary')->whereHas('user',function($query){
            $query->whereDefend('0');
        })->count();
    }

    public function curt_guid_count(){
        return $this->guid_curts()->whereType('primary')->count();
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
    public function master_sessions()
    {
        return $this->hasMany(Session::class);
    }
    public function session()
    {
        return $this->hasOne(Session::class);
    }
    public function sessions()
    {
        return $this->belongsToMany(Session::class)->withPivot(['time','confirm','info']);
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
    public function survey()
    {
        return $this->hasMany(Survey::class);
    }
    public function surveys()
    {
        return $this->belongsToMany(Survey::class)->withPivot(['time','info']);
    }
    public function newses()
    {
        return $this->hasMany(News::class);
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
        $list=null;
        if(array_key_exists('list',$levels)){
         $list=$levels['list'];
         unset($levels['list']);
        }
        $users_for_duty=User::whereIn('level',$levels)->get()->pluck('id')->toArray();
        // $duty= Duty::create([
        //      'user_id'=> $this->id,
        //      'type'=> $type,
        //      'operator_id'=> $operator,
        //      'curt_id'=> $curt,
        //      'subject_id'=> $subject,
        //      'group_id'=> $group,
        // ]);

        $options['user_id']=$this->id;

        if($add){
            $users_for_duty[]=$this->id;
           }

           if(in_array('group',$levels) && isset( $options['curt_id'])){
            $curt= Curt::find( $options['curt_id']);
            $admin_group=$curt->group->admin();
             $users_for_duty[]= $admin_group->id;
            }
            if($list){
                $users_for_duty=array_unique(array_merge($users_for_duty,$list), SORT_REGULAR) ;
               }
               $duty=   $this->duty()->create($options);

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
       if(in_array('group',$levels) && isset( $options['curt_id'])){
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
       return Jalalian::forge(Carbon::parse($this ->quizzes()->wherePivot('result','0')->orderBy('pivot_time', 'desc')->first()->pivot->time)->addDays(1))->format('d-m-Y H:i:s');
    }
    public function check_go_quiz()
    {
        // if( $this->quizzes()->wherePivot('result','0')->count()==0){
        //     return true;
        // }
        if(! $this->quizzes()->wherePivot('result','0')->orderBy('pivot_time', 'desc')->first()){
            return false;
        }
            // dd(Carbon::parse($this->quizzes()->wherePivot('result','0')->orderBy('pivot_time', 'desc')->first()->pivot->time));
            // dd( Carbon::now());
       return  Carbon::now()->diffInDays(Carbon::parse($this->quizzes()->wherePivot('result','0')->orderBy('pivot_time', 'desc')->first()->pivot->time))>=1??false;
    }
    public function is_group_admin (){
        if($count=Group::where('user_id',$this->id)->count()){
            return true;
        }
        return false;
    }




    public function convert_date( $from){
        $date=explode('-',$from);
        $fmt = numfmt_create('fa', NumberFormatter::DECIMAL);
        $year= numfmt_parse($fmt, $date[0])  ;
        $month= numfmt_parse($fmt, $date[1])  ;
        $day= numfmt_parse($fmt, $date[2])  ;
        $from=  \Morilog\Jalali\CalendarUtils::toGregorian($year, $month, $day);
        return   $from=$from[0].'-'.$from[1].'-'.$from[2].' 00:00:00';
    }


}
