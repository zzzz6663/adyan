<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'group_id',
        'status',
        'info',
        'name',
        'time',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function curts()
    {
        return $this->belongsToMany(Curt::class);
    }
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}
