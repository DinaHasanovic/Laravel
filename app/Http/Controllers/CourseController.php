<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{

    public function home(){
        return view('home');
    }


    //Get All Courses
    public function index(){
        return view('components.courses.index', [
            'courses' => Courses::latest()->filter(request(['tag', 'search']))
            ->paginate(2)
        ]);
    }
    
    //Show Form For Course Creation
    public function create(){
        return view('components.courses.create');
    }

    //Get Single Course
    public function show(Courses $course){
        return view('components.courses.show' , [
            'course' => $course
        ]);
    }

    //Create Course
    public function store(Request $request){
        // dd($request->all());
        $formFields = $request-> validate([
            'title' => ['required', Rule::unique('courses','title')],
            'description' => 'required',
            'duration' => 'required',
            'tags' => 'required',
            'price' => 'required',
        ]);
        Courses::create($formFields);


        return redirect('/')-> with('message','Course Created Successfuly!');
    }

    //Show Edit Form
    public function edit(Courses $course){
        return view('components.courses.edit', ['course' => $course]);
    }


    //Update Course Data
    public function update(Request $request, Courses $course){
        $formFields = $request-> validate([
            'title' => ['required'],
            'description' => 'required',
            'duration' => 'required',
            'tags' => 'required',
            'price' => 'required',
        ]);

        $course->update($formFields);


        return back()->with('message','Course Updated Successfuly!');
    }

    //Delete Course
    public function destroy(Courses $course){
        $course->delete();
        return redirect('/')->with('message', "Course Deleted Successfully!");
    }
}
