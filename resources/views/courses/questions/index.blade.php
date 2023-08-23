<x-layout>
    <link rel="stylesheet" href="{{ asset('css/forms/testForm.css') }}">
    <div class="testForm_body">
        <div class="testForm_container">

            <div class="testForm_difficulty">
                <form action="/courses/{{$course->id}}/take-test" method="GET">
                    <div>
                    <label for="difficulty">Select Difficulty: </label>
                    <select name="difficulty">
                        <option value="easy">Easy</option>
                        <option value="medium">Medium</option>
                        <option value="hard">Hard</option>
                    </select>
                    </div>
                    <button type="submit"> <i class="fas fa-play"></i>  Start Test</button>
                </form>
            </div>
            
            <div class="testForm_questions">
                <form action="/courses/{{$course->id}}/submit-test" method="POST">
                    @csrf
                    <input type="hidden" name="difficulty" value="{{ request('difficulty') }}">
                    @foreach ($questions as $question)
                        <div class="question">
                            <h3>{{$question->question_text}}</h3>
                            <input type="text" name="answers[{{$question->id}}]" >
                            <input type="hidden" name="shown_questions[]" value="{{$question->id}}">
                            <button type="submit" name="help_question" value='{{$question->id}}' formnovalidate>Request help</button>
                        </div>
                    @endforeach
                    <div class="testForm_submitButton">
                        @if (count($questions) > 0)
                        <button type="submit" name="submit_test" class="submit_button"> <i class="fas fa-check-circle"></i> Submit Test</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
    

</x-layout>
