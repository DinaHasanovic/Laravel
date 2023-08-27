<x-layout>
<link rel="stylesheet" href="{{ asset('css/forms/form.css') }}">
<div class="form_body">
    <div class="form_container">
        <div>
            <h2>Edit Course</h2>
        </div>
        <form method="POST" action="/courses/{{$course->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{$course->title}}">
        
            @error('title')
            <p class="errorMessage">{{$message}}</p>
            @enderror
            <br>
        
            <label for="description">Description:</label><br>
            <textarea id="description" name="description" rows="4" cols="50">
                {{$course->description}}    
            </textarea>
        
            @error('description')
            <p class="errorMessage">{{$message}}</p>
            @enderror
            <br>
        
            <label for="duration">Duration:</label>
            <input type="text" id="duration" name="duration" value="{{$course->duration}}">
        
            @error('duration')
            <p class="errorMessage">{{$message}}</p>
            @enderror
            <br>
        
            <label for="tags">Tags (use ,):</label>
            <input type="text" id="tags" name="tags" value="{{$course->tags}}">
        
            @error('tags')
            <p class="errorMessage">{{$message}}</p>
            @enderror
            <br>
        
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" min="0" step="0.01" value="{{$course->price}}">
        
            @error('price')
            <p class="errorMessage">{{$message}}</p>
            @enderror
            <br>

            <label for="image">Course Image:</label>
            <input style="color: white" type="file" name="image" value="{{$course->image}}" >

            @error('image')
            <p class="errorMessage">{{$message}}</p>
            @enderror
            <br>
        
            <button type="submit">Update Course</button>
        </form>
    </div>


    <div class="form_container">
        <div>
            <h2>Add Study Material</h2>
        </div>

        <form action="/courses/{{$course->id}}/materials" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">Material Title:</label>
            <input type="text" name="title" >

            @error('title')
            <p class="errorMessage">{{$message}}</p>
            @enderror
            <br>

            <label for="file">Upload Material:</label>
            <input style="color: white" type="file" name="file" >

            @error('file')
            <p class="errorMessage">{{$message}}</p>
            @enderror
            <br>

            <button type="submit">Upload Material</button>
        </form>
    </div>

    <div class="form_container">
        <div>
            <h2>Add Test Question</h2>
        </div>

        <form action="/courses/{{$course->id}}/questions" method="POST">
            @csrf
            <label for="difficulty">Difficulty:</label>
            <select name="difficulty">
                <option value="easy">Easy</option>
                <option value="medium">Medium</option>
                <option value="hard">Hard</option>
            </select>

            @error('difficulty')
            <p class="errorMessage">{{$message}}</p>
            @enderror
            <br>

            <label for="question_text">Question:</label>
            <input type="text" name="question_text" >

            @error('question_text')
            <p class="errorMessage">{{$message}}</p>
            @enderror
            <br>

            <label for="correct_answer">Correct Answer:</label>
            <input type="text" name="correct_answer" >

            @error('correct_answer')
            <p class="errorMessage">{{$message}}</p>
            @enderror
            <br>

            <button type="submit">Add Question</button>
        </form>
        
    </div>
</div>
</x-layout>