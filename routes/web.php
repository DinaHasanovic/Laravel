<?php

use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckStudent;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckProfessor;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\NewsFeedController;
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

//Contact Page
Route::get('/contact', [CourseController::class,'contact']);

//Courses


// All Courses
Route::get('/courses', [CourseController::class, 'index'] );

//Store Course Data
Route::post('/courses', [CourseController::class, 'store'])->middleware(['auth',CheckProfessor::class]);

//Show Edit Form
Route::get('/courses/{course}/edit',[CourseController::class, 'edit'])->middleware(['auth',CheckProfessor::class]);

//Update Course
Route::put('/courses/{course}', [CourseController::class, 'update'])->middleware(['auth',CheckProfessor::class]);

//Delete Course
Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->middleware(['auth',CheckProfessor::class]);

//Manage Courses
Route::get('/courses/manage', [CourseController::class , 'manage'])->middleware(['auth', CheckProfessor::class]);

//Show Create Form
Route::get('/courses/create', [CourseController::class, 'create'])->middleware(['auth',CheckProfessor::class]);

//Single Course
Route::get('/courses/{course}',[CourseController::class, 'show']);




//Users


//Manage Users
Route::get('/users/manage', [UserController::class, 'manage'])->middleware(['auth',CheckAdmin::class]);

//Delete User
Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware(['auth',CheckAdmin::class]);

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

//Promote to Professor
Route::post('/users/{user}/promote', [UserController::class, 'promote'])->middleware(['auth',CheckAdmin::class]);

//Demote to Student
Route::post('/users/{user}/demote', [UserController::class, 'demote'])->middleware(['auth',CheckAdmin::class]);





//Add NewsFeed
Route::post('/add-news-feed' , [NewsFeedController::class, 'create'])->middleware(['auth',CheckAdmin::class]);

//Delete NewsFeed
Route::delete('delete-news-feed/{feed}', [NewsFeedController::class , 'destroy'])->middleware(['auth',CheckAdmin::class]);

//Enroll into course
Route::post('courses/{course}/enroll',[UserController::class,'enrollStudent'])->middleware(['auth',CheckStudent::class]);

//Add Course Materials
Route::post('courses/{course}/materials', [CourseMaterialController::class, 'uploadMaterial'])->middleware(['auth',CheckProfessor::class]);

//Show Course Material
Route::get('courses/{course}/material', [CourseMaterialController::class,'showMaterials'])->middleware('auth');

//Add Course Test Questions
Route::post('courses/{course}/questions', [QuestionsController::class,'setupQuestion'])->middleware(['auth',CheckProfessor::class]);

//Show Test Questions
Route::get('courses/{course}/take-test', [QuestionsController::class, 'takeTest']);

//Show Test Results
Route::post('courses/{course}/submit-test', [QuestionsController::class,'submitTest']);

//Show Test Results
Route::get('courses/{user}/test-results', [UserController::class, 'showTests'])->middleware(['auth',CheckProfessor::class]);


//Show Course and Test History
Route::get('users/{user}/history', [UserController::class, 'enrolledCoursesHistory'])->middleware(['auth',CheckStudent::class]);








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


