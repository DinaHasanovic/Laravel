<x-layout>
    <h1>User History</h1>
    
    <h2>Enrolled Courses History</h2>
    @foreach ($user->enrolledCourses as $course)
        <div class="course-history">
            <h3>Course: {{ $course->title }}</h3>
            <p>Enrolled on: {{ $course->created_at->format('Y-m-d') }}</p>
        </div>
    @endforeach
    
    <h2>Test Attempts History</h2>
    @foreach ($testScores as $testAttemptId => $score)
        @php
            $testAttempt = \App\Models\TestAttempt::find($testAttemptId);
            $course = $testAttempt->course; // Assuming you have defined the relationship in the TestAttempt model
        @endphp
        
        @if ($course) <!-- Only show if the course exists -->
            <div class="test-attempt-history">
                <h3>Test Attempt {{ $testAttemptId }}</h3>
                <p>Course: {{ $course->title }}</p>
                <p>Score: {{ $score }}</p>
            </div>
        @endif
    @endforeach
</x-layout>
