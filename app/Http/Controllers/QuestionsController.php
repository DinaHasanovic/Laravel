<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;
use App\Models\TestQuestions;

class QuestionsController extends Controller
{

    //Create Question
    public function setupQuestion(Request $request, Courses $course){

        //Validate inputs
        $request->validate([
            'difficulty' => 'required|in:easy,medium,hard',
            'question_text' => ['required', 'max:255'],
            'correct_answer' => ['required', 'max:255'],
        ]);


        //Create new question
        TestQuestions::create([
            'course_id' => $course->id,
            'difficulty' => $request->difficulty,
            'question_text' => $request->question_text,
            'question_answer' => $request->correct_answer,
        ]);

        return back()->with('message','Question added successfully');
    }


    //Start Test
    public function takeTest(Courses $course){

        $questions = $course->questions->where('difficulty', request('difficulty'))->shuffle();

        return view('courses.questions.index', compact('course', 'questions'));
        
    }


    //Submit Test and get score
    public function submitTest(Request $request, Courses $course){
        
        $difficulty = $request->difficulty; 
        $questions = $request->input('shown_questions', []); 
        $answers = $request->input('answers');


        $shownQuestions = TestQuestions::whereIn('id', $questions)->get();
    
        $totalQuestions = count($shownQuestions);
        $correctAnswers = 0;

        foreach ($shownQuestions as $question) {
            $questionId = $question->id;
            if (isset($answers[$questionId]) && $answers[$questionId] === $question->question_answer) {
                $correctAnswers++;
            }
        }



        if ($totalQuestions === 0) {
            $score = 0;
        } else {
            $score = ($correctAnswers / $totalQuestions) * 100;
        }

        return back()->with('message', "Test submitted! Your score: {$score}%");
    }
    
    
}
