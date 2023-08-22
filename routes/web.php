<?php

use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckProfessor;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\TestAttemptController;
use App\Http\Controllers\CourseMaterialController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



//Home Page
Route::get('/', [CourseController::class, 'home']);


//Courses


// All Courses
Route::get('/courses', [CourseController::class, 'index'] );

//Store Listing Data
Route::post('/courses', [CourseController::class, 'store'])->middleware('auth');

//Show Edit Form
Route::get('/courses/{course}/edit',[CourseController::class, 'edit'])->middleware('auth');

//Update Course
Route::put('/courses/{course}', [CourseController::class, 'update'])->middleware('auth');

//Delete Course
Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->middleware('auth');

//Manage Courses
Route::get('/courses/manage', [CourseController::class , 'manage'])->middleware(['auth', CheckProfessor::class]);

//Show Create Form
Route::get('/courses/create', [CourseController::class, 'create'])->middleware('auth');

//Single Course
Route::get('/courses/{course}',[CourseController::class, 'show']);




//Users


//Manage Users
Route::get('/users/manage', [UserController::class, 'manage'])->middleware(['auth',CheckAdmin::class]);

//Delete User
Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware('auth');

//Show Register Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create New User
Route::post('/users', [UserController::class, 'store']);

//Log User Out
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show Login Form
Route::get('/login' , [UserController::class, 'login'])->name('login')->middleware('guest');

//Login User
Route::post('users/authenticate', [UserController::class, 'authenticate']);

//Show Reset Password Form
Route::get('users/{user}/resetPassword', [UserController::class,'reset'])->middleware('auth');

//Reset Password
Route::post('users/{user}',[UserController::class,'resetPassword']);




//Enroll into course
Route::post('courses/{course}/enroll',[UserController::class,'enrollStudent']);

//Add Course Materials
Route::post('courses/{course}/materials', [CourseMaterialController::class, 'uploadMaterial']);

//Show Course Material
Route::get('courses/{course}/material', [CourseMaterialController::class,'showMaterials']);

//Add Course Test Questions
Route::post('courses/{course}/questions', [QuestionsController::class,'setupQuestion']);

//Show Test Questions
Route::get('courses/{course}/take-test', [QuestionsController::class, 'takeTest']);

//Show Test Results
Route::post('courses/{course}/submit-test', [QuestionsController::class,'submitTest']);

//Show Course and Test History
Route::get('users/{user}/history', [UserController::class, 'enrolledCoursesHistory']);

Route::get('users/{user}/test-results', [UserController::class, 'showTests']);


//Email Verification


//Send Email Verification
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');


//Receive Email Verification
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');



//Resend Verification Email
Route::get('/email/resend', [UserController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.resend');



//Show Resend Verification Email Form
Route::get('/resend-verification', [UserController::class, 'showResendVerificationForm'])
    ->name('resend-verification');


