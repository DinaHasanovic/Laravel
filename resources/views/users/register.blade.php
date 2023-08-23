<x-layout>
    <link rel="stylesheet" href="{{ asset('css/forms/registerForm.css') }}">
    <div class="form_body">
        <div class="form_container">
            <div>
                <h2>User Registration</h2>
            </div>
            
            <form  method="post" action="/users" enctype="multipart/form-data">
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

                <label for="gender">Gender:</label>
                <select id="gender" name="gender">
                    <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender') === 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('gender')
                <p style="color: red">{{$message}}</p>
                @enderror
                <br>

                <label for="place_of_birth">Place of Birth:</label>
                <input type="text" id="place_of_birth" name="place_of_birth" value="{{ old('place_of_birth') }}">
                @error('place_of_birth')
                <p style="color: red">{{$message}}</p>
                @enderror
                <br>

                <label for="country">Country:</label>
                <input type="text" id="country" name="country" value="{{ old('country') }}">
                @error('country')
                <p style="color: red">{{$message}}</p>
                @enderror
                <br>

                <label for="birth_date">Birth Date:</label>
                <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date') }}">
                @error('birth_date')
                <p style="color: red">{{$message}}</p>
                @enderror
                <br>

                <label for="personal_number">Personal Number:</label>
                <input type="text" id="personal_number" name="personal_number" value="{{ old('personal_number') }}">
                @error('personal_number')
                <p style="color: red">{{$message}}</p>
                @enderror
                <br>

                <label for="phone_number">Phone Number:</label>
                <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
                @error('phone_number')
                <p style="color: red">{{$message}}</p>
                @enderror
                <br>

                <label for="picture">Picture:</label>
                <input type="file" id="picture" name="picture">
                @error('picture')
                <p style="color: red">{{$message}}</p>
                @enderror
                <br>

                <button type="submit">Sign Up</button>

                <p style="text-align: center; margin-bottom:5%">Have an Account? <a href="/login">Login Here</a></p>

            </form>
        </div>
    </div>
    
</x-layout>