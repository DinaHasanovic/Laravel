<x-layout>
    <h1>Professor Dashboard</h1>
    
    <h2>Average Test Scores</h2>
    @foreach ($courseAverages as $courseId => $averageScore)
        @php
            $course = \App\Models\Courses::find($courseId);
        @endphp

        @if ($course)
            <div class="course-average">
                <h3>Course: {{ $course->title }}</h3>
                <p>Average Score: {{ $averageScore ?? 'N/A' }}</p>
            </div>
        @endif
    @endforeach
</x-layout>
