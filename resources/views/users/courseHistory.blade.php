<x-layout>
    <h1>User History</h1>
    
    <h2>Enrolled Courses History</h2>
    @foreach ($user->enrolledCourses as $course)
        <div class="course-history">
            <h3>Course: {{ $course->title }}</h3>
            <p>Enrolled on: {{ $course->pivot->created_at }}</p>
        </div>
    @endforeach
    
    <h2>Test Attempts History</h2>
    @foreach ($testScores as $testAttemptId => $score)
        <div class="test-attempt-history">
            <h3>Test Attempt {{ $testAttemptId }}</h3>
            <p>Score: {{ $score }}</p>
        </div>
    @endforeach
</x-layout>
