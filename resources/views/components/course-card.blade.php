@props(['course'])

@php
    use Illuminate\Support\Str;
@endphp

<link rel="stylesheet" href="{{ asset('css/course-card.css') }}">
<div class="courses_Item">
    <div class="courses_Image"></div>
    <div class="courses_Content">
        <a href="courses/{{$course['id']}}" class="courses_Title">{{$course->title}}</a>
        <div class="course_tags">
            <x-course-tags :tags="$course->tags"/>
        </div>
        <h3 class="courses_Text">{{ Str::limit($course->description, 150) }}</h3>
        <h3 class="course_createDate">Price: {{$course->price}}$</h3>
        <h3 class="course_createDate">Created: {{$course->created_at->format('Y-m-d')}}</h3>
    </div>
</div>