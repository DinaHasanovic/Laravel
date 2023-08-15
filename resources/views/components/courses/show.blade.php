<x-layout>
<link rel="stylesheet" href="{{ asset('css/course.css') }}">
<div class="course_Body">
    <div class="courses_Item">
        <div class="course_Image"></div>
        <div class="course_Content">
            <h2 class="course_Title">{{$course['title']}}</h2>
            <h3 class="course_Text">{{$course['description']}}</h3>
        </div>
    </div>
    <div class="course_buttons">
    <a href="/courses/{{$course->id}}/edit" class="course_button">Edit</a>
    <a href="/" class="course_button">
        <form method="POST" action="/courses/{{$course->id}}">
        @csrf
        @method('DELETE')
        <button>Delete</button>
    </form>
    </a>
    </div>
</div>
</x-layout>