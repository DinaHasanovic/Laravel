<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;
use App\Models\CourseMaterial;

class CourseMaterialController extends Controller
{
    //Upload Course Material
    public function uploadMaterial(Request $request,Courses $course){
        
        //Validate Inputs
        $formFields = $request->validate([
            'title' => ['required','max:255'],
            'file' => ['required','mimes:pdf,docx']
        ]);

        //Upload file to storage
        $filePath = $request->file('file')->store('materials','public');

        //Create new Course Material
        CourseMaterial::create([
            'course_id' => $course->id,
            'title' => $request->title,
            'file_path' => $filePath,
        ]);

        return back()->with('message','Material uploaded successfully');
    }


    //Show Course Material
    public function showMaterials(Courses $course){
        
        $courseMaterials = $course->materials;

        return view('courses.materials.index', compact('course','courseMaterials'));
    }
}
