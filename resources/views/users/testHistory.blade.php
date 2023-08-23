<x-layout>
    <link rel="stylesheet" href="{{ asset('css/tables/testHistory.css') }}">
    <h1>Professor Dashboard</h1>
    <div class="course-average-table">
        <table>
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Average Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courseAverages as $courseId => $averageScore)
                    @php
                        $course = \App\Models\Courses::find($courseId);
                    @endphp

                    @if ($course)
                        <tr class="test_results_rows">
                            <td>{{ $course->title }}</td>
                            <td>{{ $averageScore ?? 'N/A' }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
