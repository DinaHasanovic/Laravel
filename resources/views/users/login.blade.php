<x-layout>
    <h2>User Registration</h2>
    <form  method="post" action="/users/authenticate">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{old('email')}}">
        @error('email')
        <p style="color: red">{{$message}}</p>
        @enderror
        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="{{old('password')}}">
        @error('password')
        <p style="color: red">{{$message}}</p>
        @enderror
        <br>
        <button type="submit">Login</button>
    </form>
</x-layout>