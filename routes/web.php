<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckProfessor;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;

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

// All Listings
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





//Manage Users
Route::get('/users/manage', [UserController::class, 'manage'])->middleware('auth');

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
