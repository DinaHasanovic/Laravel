<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Notifications\VerifyEmail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Notification;

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

        $user->sendEmailVerificationNotification();

        
        //Login
        auth()->login($user);


        return redirect('/resend-verification')->with('message','User created and logged in');
    }


    //Send Verification Email
    public function sendEmailVerificationNotification(User $user)
    {
        // $verificationUrl = URL::temporarySignedRoute(
        //     'verification.verify',
        //     now()->addMinutes(config('auth.verification.expire', 60)),
        //     [
        //         'id' => $user->getKey(),
        //         'hash' => sha1($user->getEmailForVerification()),
        //     ]
        // );

        $user->notify(new VerifyEmail); // Send the verification notification
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


    //Delete User
    public function destroy(User $user){

        $user->delete();
        return redirect('/')->with('message', "User Deleted Successfully!");
    }

    //Manage Users
    public function manage(){
        $adminId = auth()->user()->id;
        $users = User::where('id', '!=', $adminId)->get();
        return view('users.manage', ['users' => $users]);
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

    //Show Resend Email Verification Form
    public function showResendVerificationForm(){
        return view('components.verification-notice');
    }

    //Resend Email Verification
    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('home')->with('status', 'Your email is already verified.');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'Verification link has been sent to your email address.');
    }
    
}
