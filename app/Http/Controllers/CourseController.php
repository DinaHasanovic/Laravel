<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    //
    public function index(){
        return view('components/courses/index', [
            'courses' => Courses::latest()->filter(request(['tag']))
            ->get()
        ]);
    }

    public function create(){
        return view('components/create');
    }

    public function show(Courses $course){
        return view('components/courses/show' , [
            'course' => $course
        ]);
    }

    public function store(Request $request){
        // dd($request->all());
        $formFields = $request-> validate([
            'naziv' => ['required', Rule::unique('courese','naziv')],
            'opis' => 'required',
            'trajanje' => 'required',
            'tagovic' => 'required',
            'cena' => 'required',
        ]);
        return redirect('/');
    }
}
