<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable=[
        'tag',
        'user_id',
    ];
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
    public function curts()
    {
        return $this->belongsToMany(Curt::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
