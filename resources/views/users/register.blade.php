<x-layout>
    <h2>User Registration</h2>
    <form  method="post" action="/users">
        @csrf
        <label for="name">Username:</label>
        <input type="text" id="name" name="name" value="{{old('name')}}">

        @error('name')
            <p style="color: red">{{$message}}</p>
        @enderror
        <br>

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

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation')}}">
        @error('password_confirmation')
        <p style="color: red">{{$message}}</p>
        @enderror
        <br> 

        <button type="submit">Register</button>
    </form>
</x-layout>