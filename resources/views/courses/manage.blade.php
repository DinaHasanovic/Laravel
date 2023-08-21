<link rel="stylesheet" href="{{ asset('css/manage.css') }}">
<x-layout>
    <h1 class="heading">Course Management</h1>
    @unless ($courses->isEmpty())
    <div class="manage_container">
        <table>
            <thead>
                <tr>
                    <th>Courses</th>
                    <th>Enrolled Students</th>
                    <th class="actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr class="courses_rows">
                    <td class="course-name"><a href="/courses/{{$course->id}}">{{$course->title}}</a></td>
                    <td>
                        @foreach ($course->enrolledStudents as $student)
                            {{$student->name}} 
                            @if (!$loop->last),
                            @endif
                        @endforeach
                    </td>
                    <td class="actions">
                        <button class="edit-button"><a href="/courses/{{$course->id}}/edit""><i class="fa-solid fa-pencil"></i>  Edit</a></button>
                            <form style="display: inline;" method="POST" action="/courses/{{$course->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="delete-button"><a href="/"><i class="fa-solid fa-trash"></i>Delete</a></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
    @else
    <div>
        <p>No Courses Found</p>
    </div>
    @endunless
    
</x-layout>