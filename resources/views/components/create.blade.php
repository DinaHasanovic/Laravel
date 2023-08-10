Course Form 
To be Created....
<form method="POST" action="/courses/create">
    @csrf
    <label for="naziv">Naziv kursa:</label>
    <input type="text" id="naziv" name="naziv"><br><br>

    @error('naziv')
    <p>{{$message}}</p>
    @enderror

    <label for="opis">Opis kursa:</label><br>
    <textarea id="opis" name="opis" rows="4" cols="50"></textarea><br><br>

    @error('opis')
    <p>{{$message}}</p>
    @enderror

    <label for="trajanje">Trajanje kursa:</label>
    <input type="text" id="trajanje" name="trajanje"><br><br>

    @error('trajanje')
    <p>{{$message}}</p>
    @enderror

    <label for="tagovi">Tagovi (odvojeni zarezima):</label>
    <input type="text" id="tagovi" name="tagovi"><br><br>

    @error('tagovi')
    <p>{{$message}}</p>
    @enderror

    <label for="cena">Cena kursa:</label>
    <input type="number" id="cena" name="cena" min="0" step="0.01"><br><br>

    @error('cena')
    <p>{{$message}}</p>
    @enderror

    <button type="submit">Dodaj Kurs</button>
</form>
