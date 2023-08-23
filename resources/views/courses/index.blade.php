<x-layout>
    @include('partials._search')
<link rel="stylesheet" href="{{ asset('css/courses.css') }}">
<div class="courses_Body">
    <div class="courses_Grid">
        @unless (count($courses) == 0)

        @foreach ($courses as $course)
            <x-course-card :course="$course" />
        @endforeach

        @else 
        <div>
            <p>No Courses Found</p>
        </div>
        @endunless
    </div>
</div>
<div class="p-6">
    {{$courses->links()}}
</div>
<div>
    <a href="/courses/create">Create Course</a>
</div>
</x-layout>