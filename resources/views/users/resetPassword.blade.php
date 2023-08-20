<x-layout>
    <link rel="stylesheet" href="{{ asset('css/forms/resetform.css') }}">
    <div class="form_body">
        <div class="form_container">
            <div>
                <h2>Reset Password</h2>
            </div>
            <form method="POST" action="/users/{{$user->id}}">
                @csrf
                <label for="password">New Password:</label>
                <input type="password" id="password" name="password">
                
                @error('password')
                <p style="color: red">{{$message}}</p>
                @enderror
                <br>
                    
                <label for="password_confirmation">Confirm New Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
                <br>    
                
                <button type="submit">Reset Password</button>
            </form>
        </div>
    </div>
</x-layout>