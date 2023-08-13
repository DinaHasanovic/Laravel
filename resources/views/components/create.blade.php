Course Form 
To be Created....
<link rel="stylesheet" href="{{ asset('css/courses.css') }}">
<form method="POST" action="/courses">
    @csrf
    <label for="title">Naziv kursa:</label>
    <input type="text" id="title" name="title" value="{{old('title')}}"><br><br>

    @error('title')
    <p class="errorMessage">{{$message}}</p>
    @enderror

    <label for="description">Opis kursa:</label><br>
    <textarea id="description" name="description" rows="4" cols="50">
        {{old('description')}}    
    </textarea><br><br>

    @error('description')
    <p class="errorMessage">{{$message}}</p>
    @enderror

    <label for="duration">Trajanje kursa:</label>
    <input type="text" id="duration" name="duration" value="{{old('duration')}}"><br><br>

    @error('duration')
    <p class="errorMessage">{{$message}}</p>
    @enderror

    <label for="tags">Tagovi (odvojeni zarezima):</label>
    <input type="text" id="tags" name="tags" value="{{old('tags')}}"><br><br>

    @error('tags')
    <p class="errorMessage">{{$message}}</p>
    @enderror

    <label for="price">Cena kursa:</label>
    <input type="number" id="price" name="price" min="0" step="0.01" value="{{old('price')}}"><br><br>

    @error('price')
    <p class="errorMessage">{{$message}}</p>
    @enderror

    <button type="submit">Dodaj Kurs</button>
</form>
