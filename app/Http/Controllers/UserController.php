<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create(){
        return view('users.register');
    }

    //Create New User
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required', 'email', Rule::unique('users','email')],
            'password' => ['required', 'confirmed', 'min:6'],
            
        ]);

        //Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        //Role
        $formFields['role'] = 'admin';

        //Create User
        $user = User::create($formFields);

        
        //Login
        auth()->login($user);


        return redirect('/')->with('message','User created and logged in');
    }

    //Log User Out
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','You have been logged out');
    }

    //Show Login Form
    public function login(){
        return view('users.login');
    }

    //Authenticate User
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message','You are now logged in!');
        }

        return back()->withErrors(['email'=> 'Invalid Credentials'])->onlyInput('email');

    }

    //Show Reset Password Form
    public function reset(User $user){
        return view('users.resetPassword', ['user' => $user]);
    }

    //Reset Password
    public function resetPassword(Request $request,User $user){
        $formFields = $request->validate([
            'password' => ['required','min:6','confirmed']
        ]);

        $user->update([
            'password' => Hash::make($formFields['password']),
        ]);

        return redirect('/');

    }
}
