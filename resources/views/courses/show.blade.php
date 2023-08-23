<x-layout>
<link rel="stylesheet" href="{{ asset('css/course.css') }}">
<div class="course_Body">
    <div class="course_Container">
        <div class="course_Image">

        </div>
        <div class="course_Info">
            <h2 class="course_Title">{{$course['title']}}</h2>
            <h3 class="course_Description">{{$course['description']}}</h3>
            <div class="course_Details">
                <p><strong>Professor:</strong><span> {{$course->user->name}}</span></p>
                <p><strong>Tags: </strong> <x-course-tags :tags="$course->tags" /></p>
                <p><strong>Duration:</strong><span> {{$course['duration']}} hours</span></p>
                <p><strong>Price:</strong><span> {{$course['price']}}$</span></p>
                <p><strong>Materials:</strong><span> Video Lectures, PDFs</span></p>
            </div>
            <div class="course_buttons">
                @if (auth()->user()-> role === 'student')
                    @if ($course->enrolledStudents()->where('user_id', auth()->user()->id)->exists())
                        <a href="/courses/{{$course->id}}/take-test" class="course_button_test">
                            <i class="fas fa-pencil-alt"></i>
                            Start Test</a>
                        <a href="/courses/{{$course->id}}/material" class="course_button_material">
                            <i class="fas fa-book"></i>
                            View Material</a>
                    @else
                        <form action="/courses/{{$course->id}}/enroll" method="POST" class="course_button_enroll_form">
                            @csrf
                            <button type="submit" class="course_button_enroll">
                                <i class="fas fa-check-circle"></i>
                                Enroll
                            </button>
                        </form>
                    @endif
                @elseif(auth()->user()->role === 'professor' && auth()->user()->id === $course->user_id)
                    <a href="/courses/{{$course->id}}/material" class="course_button_material">
                        <i class="fas fa-book"></i>
                        View Material
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
</x-layout>