<x-layout>
<link rel="stylesheet" href="{{ asset('css/forms/form.css') }}">
<div class="form_body">
    <div class="form_container">
        <div>
            <h2>Create New Post</h2>
        </div>
        <form method="POST" action="/posts" enctype="multipart/form-data">
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

            <label for="image">Post Image:</label>
            <input style="color: white" type="file" name="image" >

            @error('image')
            <p class="errorMessage">{{$message}}</p>
            @enderror
            <br>

            <button type="submit">Create Post</button>
        </form>
    </div>
</div>
</x-layout>
