<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',//نام گروه
        'user_id', //ای دی  مدیر گروه
    ];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function curts()
    {
        return $this->hasMany(Curt::class);
    }
    public function admin()
    {
        return User::find($this->user_id);
    }
}
