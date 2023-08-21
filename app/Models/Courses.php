<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Courses extends Model
{
    use HasFactory;

    protected $fillable = ['title','tags','description','price','duration','user_id'];


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
}
