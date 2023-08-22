<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TestAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestAttemptController extends Controller
{
    public function index(User $user){
        

    // dd($user->testAttemtps);
    $testScored = $user->testAttemtps->pluck('score','id');
        return view('users.test_attempts', compact('testScored'));
    }
    
}
