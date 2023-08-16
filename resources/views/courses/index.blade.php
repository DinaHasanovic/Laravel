<x-layout>
<link rel="stylesheet" href="{{ asset('css/courses.css') }}">
<div class="courses_Body">
    <div class="courses_Grid">
        @unless (count($courses) == 0)
            

        @foreach ($courses as $course)
        <x-course-card :course="$course" />
        @endforeach

        {{-- Hard Coded Data --}}
        <div class="courses_Item">
            <div class="courses_Image"></div>
            <div class="courses_Content">
                <h2 class="courses_Title">Flexible Learning</h2>
                <h3 class="courses_Text">Fit learning into your busy schedule with our easy-to-follow, mobile-friendly courses.</h3>
            </div>
        </div>
        @else 
        <p>No Courses Found :(</p>
        @endunless
    </div>
</div>
<div class="p-6">
    {{$courses->links()}}
</div>
</x-layout>