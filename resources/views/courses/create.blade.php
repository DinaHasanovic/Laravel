<x-layout>
<link rel="stylesheet" href="{{ asset('css/form.css') }}">
<div class="form_body">
    <div class="form_container">
        <div>
            <h2>Create New Course</h2>
        </div>
        <form method="POST" action="/courses">
            @csrf
            <label for="title">Name:</label>
            <input type="text" id="title" name="title" value="{{old('title')}}"><br>
        
            @error('title')
            <p>{{$message}}</p>
            @enderror
        
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" cols="50">
                {{old('description')}}    
            </textarea><br>
        
            @error('description')
            <p>{{$message}}</p>
            @enderror
        
            <label for="duration">Duration:</label>
            <input type="text" id="duration" name="duration" value="{{old('duration')}}"><br>
        
            @error('duration')
            <p>{{$message}}</p>
            @enderror
        
            <label for="tags">Tags:</label>
            <input type="text" id="tags" name="tags" value="{{old('tags')}}"><br>
        
            @error('tags')
            <p>{{$message}}</p>
            @enderror
        
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" min="0" step="0.01" value="{{old('price')}}"><br>
        
            @error('price')
            <p>{{$message}}</p>
            @enderror
        
            <button type="submit">Create Course</button>
        </form>
    </div>
</div>
</x-layout>