<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    //
    public function index(){
        return view('layout');
    }

    public function create(){
        return view('components/create');
    }

    public function show(){
        return view('components/course');
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
