<?php

namespace App\Models;

use App\Models\Courses;
use App\Models\TestAttempt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestQuestions extends Model
{
    use HasFactory;

    protected $fillable = ['course_id','difficulty','question_text','question_answer'];

    //Relationship with course (Every course has question for a test for that course)
    public function course(){
        return $this->belongsTo(Courses::class);
    }
}
