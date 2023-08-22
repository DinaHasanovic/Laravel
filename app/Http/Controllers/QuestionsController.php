<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\TestAttempt;
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



    public function calculateScore($questions, $answers, $help_question, $difficulty) {
        $shownQuestions = TestQuestions::whereIn('id', $questions)->get();
    
        $totalQuestions = count($shownQuestions);
        $correctAnswers = 0;
        $helpCorrectAnswers = 0;
    
        foreach ($shownQuestions as $question) {
            $questionId = $question->id;
            if (isset($answers[$questionId]) && $answers[$questionId] === $question->question_answer) {
                $correctAnswers++;
                if ($help_question && $help_question === $questionId) {
                    $helpCorrectAnswers++;
                }
            }
        }
    
        // Calculate score based on regular and help answers
        $score = ($correctAnswers + ($helpCorrectAnswers * 0.5)) / $totalQuestions * 100;
    
        if ($totalQuestions === 0) {
            $score = 0;
        }
    
        return $score;
    }


    //Submit Test and get score
    public function submitTest(Request $request, Courses $course) {
        $difficulty = $request->difficulty; 
        $questions = $request->input('shown_questions', []); 
        $answers = $request->input('answers');
        $help_question = $request->input('help_question');
        
        if ($request->has('submit_test')) {
            $score = $this->calculateScore($questions, $answers, $help_question, $difficulty);

            $testAttempt = TestAttempt::create([
                'user_id' => auth()->user()->id,
                'test_attempt_number' => TestAttempt::where('user_id', auth()->user()->id)->count() + 1,
                'score' => $score,
                ]);


          

            return back()->with('message', "Test submitted! Your score: {$score}%");
        }
        
        // If request help button is clicked, replace the question and redirect back
        if ($help_question) {
            // Replace the current question with a new one
            $newQuestion = TestQuestions::where('difficulty', $difficulty)
                ->whereNotIn('id', $questions) // Exclude already shown questions
                ->inRandomOrder() // Get a random question
                ->first();
            
            if ($newQuestion) {
                // Update the shown questions array to include the new question's ID
                $questions[] = $newQuestion->id;
                // Remove the previous question's ID from the array
                $questions = array_diff($questions, [$help_question]);
                // Store the new question's ID in the session
                session(['new_question' => $newQuestion->id]);
                // Redirect back with a success message
                return back()->with('success', 'Question replaced.');
            } else {
                // If no more questions are available
                return back()->with('message', 'No more questions available.');
            }
        }
        
        // Calculate the score, considering the new question's point value
        $newQuestionId = session('new_question');
        $newQuestionValue = 0.5; // Adjust the point value as needed
        $score = $this->calculateScore($questions, $answers, $newQuestionId, $difficulty) + $newQuestionValue;
        
        return view('courses.questions.index', compact('course', 'questions', 'score'));
    }


}
