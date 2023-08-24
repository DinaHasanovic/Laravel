<?php

namespace App\Models;

use App\Models\User;
use App\Models\CourseMaterial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Courses extends Model
{
    use HasFactory;

    protected $fillable = ['title','tags','description','price','duration','user_id','image'];


    //Filter for search (name,tags,description)
    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false){
            $query->where('tags','like','%' . request('tag') . '%');
        }


        if($filters['search'] ?? false){
            $query->where('title','like','%' . request('search') . '%')
                  ->orWhere('description','like','%' . request('search') . '%')
                  ->orWhere('tags','like','%' . request('search') . '%');;
        }
    }


    //Relationship to User (First set up relations in database with migrations)
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    //Relationship with User(Student)
    public function enrolledStudents(){
        return $this->belongsToMany(User::class, 'course_user' , 'course_id' , 'user_id');
    }

    //Relationship with course study material
    public function materials(){
        return $this->hasMany(CourseMaterial::class, 'course_id');
    }

    //Relationship with questions(Course has questions for the test)
    public function questions(){
        return $this->hasMany(TestQuestions::class,'course_id');
    }

    //Relationship with testAttempts(to get scores of a students for a specific course)
    public function testAttempts()
{
    return $this->hasMany(TestAttempt::class, 'course_id');
}
}
