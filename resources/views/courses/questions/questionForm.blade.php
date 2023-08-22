<x-layout>
    <form action="/courses/{{$course->id}}/questions" method="POST">
        @csrf
        <label for="difficulty">Difficulty:</label>
        <select name="difficulty">
            <option value="easy">Easy</option>
            <option value="medium">Medium</option>
            <option value="hard">Hard</option>
        </select>
        <label for="question_text">Question:</label>
        <input type="text" name="question_text" required>
        <label for="correct_answer">Correct Answer:</label>
        <input type="text" name="correct_answer" required>
        <button type="submit">Add Question</button>
    </form>
    
</x-layout>