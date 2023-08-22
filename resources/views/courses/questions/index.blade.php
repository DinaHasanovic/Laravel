<x-layout>
    <form action="/courses/{{$course->id}}/take-test" method="GET">
        <label for="difficulty">Select Difficulty:</label>
        <select name="difficulty">
            <option value="easy">Easy</option>
            <option value="medium">Medium</option>
            <option value="hard">Hard</option>
        </select>
        <button type="submit">Start Test</button>
    </form>
    
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
        <button type="submit" name="submit_test">Submit Test</button>

    </form>

    
    @if(session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
@endif

</x-layout>
