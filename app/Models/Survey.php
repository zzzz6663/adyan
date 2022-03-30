<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'plan_id',
        'curt_id',
        'subject_id',
        'info',
        'name',
        'time',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function users(){
        return $this->belongsToMany(User::class)->withPivot(['time','info']);
    }
    public function plan(){
        return $this->belongsTo(Plan::class);
    }
    public function curt(){
        return $this->belongsTo(Curt::class);
    }
    public function subject(){
        return $this->belongsTo(Subject::class);
    }
    public function logs(){
        return $this->hasMany(Log::class);
    }
    public function duties(){
        return $this->hasMany(Duty::class);
    }

}
