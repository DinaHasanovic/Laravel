<x-layout>
    <link rel="stylesheet" href="{{ asset('css/loginForm.css') }}">
    <div class="form_body">
        <div class="form_container">
            <div>
            <h2>User Login</h2>
            </div>
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

            <a>Forget Password?</a>
            <button type="submit">Login</button>

            <p style="text-align: center;">Not a Member?  <a style="padding-left: 2%" href="/register">Sign In</a></p>
            </form>
        </div>
</div>
</x-layout>