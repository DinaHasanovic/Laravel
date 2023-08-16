<?php

use Illuminate\Support\Facades\Route;
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
Route::get('/courses/manage', [CourseController::class , 'manage'])->middleware('auth');

//Show Create Form
Route::get('/courses/create', [CourseController::class, 'create'])->middleware('auth');

//Single Course
Route::get('/courses/{course}',[CourseController::class, 'show']);


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
