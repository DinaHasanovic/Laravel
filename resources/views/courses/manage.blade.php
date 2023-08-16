<x-layout>
    @unless ($courses->isEmpty())
    @foreach ($courses as $course)
        <h2>{{$course->title}}</h2>
    @endforeach
    
    @else
    <div>
        <p>No Courses Found</p>
    </div>
    @endunless
    
</x-layout>