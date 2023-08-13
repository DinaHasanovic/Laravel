@props(['course'])

<div class="courses_Item">
    <div class="courses_Image"></div>
    <div class="courses_Content">
        <a href="courses/{{$course['id']}}" class="courses_Title">{{$course->title}}</a>
        <x-course-tags :tags="$course->tags" />
        <h3 class="courses_Text">{{$course->description}}</h3>
    </div>
</div>