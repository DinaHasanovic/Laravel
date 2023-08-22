<x-layout>
<link rel="stylesheet" href="{{ asset('css/forms/form.css') }}">
<div class="form_body">
    <div class="form_container">
        <div>
            <h2>Edit Course</h2>
        </div>
        <form method="POST" action="/courses/{{$course->id}}">
            @csrf
            @method('PUT')
            <label for="title">Naziv kursa:</label>
            <input type="text" id="title" name="title" value="{{$course->title}}">
        
            @error('title')
            <p class="errorMessage">{{$message}}</p>
            @enderror
            <br>
        
            <label for="description">Opis kursa:</label><br>
            <textarea id="description" name="description" rows="4" cols="50">
                {{$course->description}}    
            </textarea>
        
            @error('description')
            <p class="errorMessage">{{$message}}</p>
            @enderror
            <br>
        
            <label for="duration">Trajanje kursa:</label>
            <input type="text" id="duration" name="duration" value="{{$course->duration}}">
        
            @error('duration')
            <p class="errorMessage">{{$message}}</p>
            @enderror
            <br>
        
            <label for="tags">Tagovi (odvojeni zarezima):</label>
            <input type="text" id="tags" name="tags" value="{{$course->tags}}">
        
            @error('tags')
            <p class="errorMessage">{{$message}}</p>
            @enderror
            <br>
        
            <label for="price">Cena kursa:</label>
            <input type="number" id="price" name="price" min="0" step="0.01" value="{{$course->price}}">
        
            @error('price')
            <p class="errorMessage">{{$message}}</p>
            @enderror
            <br>
        
            <button type="submit">Update Course</button>
        </form>

        <form action="/courses/{{$course->id}}/materials" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">Material Title:</label>
            <input type="text" name="title" required>
            <label for="file">Upload Material:</label>
            <input type="file" name="file" required>
            <button type="submit">Upload Material</button>
        </form>


        <form action="/courses/{{$course->id}}/questions" method="POST">
            @csrf
            <label for="difficulty">Difficulty:</label>
            <select name="difficulty">
                <option value="easy">Easy</option>
                <option value="medium">Medium</option>
                <option value="hard">Hard</option>
            </select>
            <label for="question_text">Question:</label>
            <input type="text" name="question_text" >
            <label for="correct_answer">Correct Answer:</label>
            <input type="text" name="correct_answer" >
            <button type="submit">Add Question</button>
        </form>
        
    </div>
</div>
</x-layout>