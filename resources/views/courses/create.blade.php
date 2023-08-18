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
            <input type="text" id="title" name="title" value="{{old('title')}}">
        
            @error('title')
            <p>{{$message}}</p>
            @enderror
            <br>
        
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" cols="50">
                {{old('description')}}    
            </textarea>
        
            @error('description')
            <p>{{$message}}</p>
            @enderror
            <br>
        
            <label for="duration">Duration:</label>
            <input type="text" id="duration" name="duration" value="{{old('duration')}}">
        
            @error('duration')
            <p>{{$message}}</p>
            @enderror
            <br>
        
            <label for="tags">Tags:</label>
            <input type="text" id="tags" name="tags" value="{{old('tags')}}">
        
            @error('tags')
            <p>{{$message}}</p>
            @enderror
            <br>
        
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" min="0" step="0.01" value="{{old('price')}}">
        
            @error('price')
            <p>{{$message}}</p>
            @enderror
            <br>
        
            <button type="submit">Create Course</button>
        </form>
    </div>
</div>
</x-layout>