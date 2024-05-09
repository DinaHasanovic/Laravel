<x-layout>
<link rel="stylesheet" href="{{ asset('css/forms/form.css') }}">
<div class="form_body">
    <div class="form_container">
        <div>
            <h2>Edit Post</h2>
        </div>
        <form method="POST" action="/posts/{{$post->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{$post->title}}">

            @error('title')
            <p class="errorMessage">{{$message}}</p>
            @enderror
            <br>

            <label for="description">Description:</label><br>
            <textarea id="description" name="description" rows="4" cols="50">
                {{$post->description}}
            </textarea>

            @error('description')
            <p class="errorMessage">{{$message}}</p>
            @enderror
            <br>


            <label for="image">Post Image:</label>
            <input style="color: white" type="file" name="image" value="{{$post->image}}" >

            @error('image')
            <p class="errorMessage">{{$message}}</p>
            @enderror
            <br>

            <button type="submit">Update Post</button>
        </form>
    </div>

</div>
</x-layout>
