<x-layout>
    <link rel="stylesheet" href="{{ asset('css/tables/courseHistory.css') }}">
    <div class="courseHistory_table">
        <table>
            <thead>
                <tr>
                    <th>Enrolled Courses History</th>
                    <th>Test Attempts History</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user->enrolledCourses as $course)
                    @php
                        $testAttemptsForCourse = $user->testAttemtps->where('course_id', $course->id);
                    @endphp

                    <tr>
                        <td>
                            <div class="course-history-item">
                                <h3>Course: {{ $course->title }}</h3>
                                <p>Enrolled on: {{ $course->created_at->format('Y-m-d') }}</p>
                            </div>
                        </td>
                        <td class="test_results">
                            @foreach ($testAttemptsForCourse as $testAttempt)
                                @php
                                    $score = $testScores[$testAttempt->id] ?? 'N/A';
                                @endphp

                                <div class="test-attempt-item">
                                    <h3>Test Attempt {{ $testAttempt->id }}</h3>
                                    <p>Score: {{ $score }}%</p>
                                </div>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
