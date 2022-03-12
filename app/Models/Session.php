<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'status',
        'name',
        'time',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
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
