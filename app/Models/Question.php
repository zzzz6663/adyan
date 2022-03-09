<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable=[
        'quiz_id',//کلید آزمون
        'question',//سوال
        'a1',//جواب یک
        'a2',//جواب دو
        'a3',//جواب سه
        'a4',//جواب چهار
        'answer',//جواب صحیح
    ];
    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }
    public function users(){
        return $this->belongsToMany(User::class)->withPivot(['quiz_id','number','user_answer','question_answer']);
    }

}
