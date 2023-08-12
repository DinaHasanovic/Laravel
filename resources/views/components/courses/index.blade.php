<link rel="stylesheet" href="{{ asset('css/courses.css') }}">
<div class="courses_Body">
    <div class="courses_Grid">
        {{-- Foreach will be added to get all courses --}}
        @foreach ($courses as $course)
        <div class="courses_Item">
            <div class="courses_Image"></div>
            <div class="courses_Content">
                <a href="courses/{{$course['id']}}" class="courses_Title">{{$course->title}}</a>
                <x-course-tags :tags="$course->tags" />
                <h3 class="courses_Text">{{$course->description}}</h3>
            </div>
        </div>
        @endforeach
        <div class="courses_Item">
            <div class="courses_Image"></div>
            <div class="courses_Content">
                <h2 class="courses_Title">Flexible Learning</h2>
                <h3 class="courses_Text">Fit learning into your busy schedule with our easy-to-follow, mobile-friendly courses.</h3>
            </div>
        </div>
        
    </div>
</div>