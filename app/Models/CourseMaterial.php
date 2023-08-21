<?php

namespace App\Models;

use App\Models\Courses;
use App\Models\CourseMaterial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseMaterial extends Model
{
    use HasFactory;

    protected $fillable = ['course_id','title','file_path'];

    public function course(){
        return $this->belongsTo(Courses::class, 'course_id');
    }

}
