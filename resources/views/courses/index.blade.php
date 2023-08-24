<x-layout>
    @include('partials._search')
<link rel="stylesheet" href="{{ asset('css/courses.css') }}">
<div class="courses_Body">
    <div class="newsFeed">
        <h2>News Feed</h2>
        @foreach ($newsFeed as $item)
        <x-newsFeed  :item="$item"/>
        @endforeach
        @auth
            @if (auth()->user()->role === 'admin')
                <div class="add-news-feed-form">
                    <form action="/add-news-feed" method="POST">
                        @csrf
                        <label for="content">News Feed Content:</label>
                        <textarea name="content" rows="4" cols="50"></textarea>
                        <button type="submit"><i class="fa-solid fa-circle-plus"></i> Add News Feed</button>
                    </form>
                </div>
            @endif
        @endauth
    </div>
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
    @if (auth()->check())
        @if (auth()->user()->role === 'student')
            <form class="create_courseButton" action="/apply-for-professor" method="POST">
                @csrf
                <button> <i class="fas fa-user-graduate"></i> Apply for Professor</button>
            </form>
        @elseif (auth()->user()->role === 'professor' || auth()->user()->role === 'admin')
            <div class="create_courseButton">
                <a href="/courses/create"><i class="fa-solid fa-circle-plus"></i> Create Course</a>
            </div>
        @endif
    @endif
</div>
</x-layout>