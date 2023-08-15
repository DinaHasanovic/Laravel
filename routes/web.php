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

// Route::get('/', [CourseController::class, 'home']);

// All Listings
Route::get('/', [CourseController::class, 'index'] );


//Store Listing Data
Route::post('/courses', [CourseController::class, 'store']);

//Show Edit Form
Route::get('/courses/{course}/edit',[CourseController::class, 'edit']);

//Update Course
Route::put('/courses/{course}', [CourseController::class, 'update']);

//Delete Course
Route::delete('/courses/{course}', [CourseController::class, 'destroy']);


//Show Create Form
Route::get('/courses/create', [CourseController::class, 'create']);

//Single Listing
Route::get('/courses/{course}',[CourseController::class, 'show']);


//Show Register Create Form
Route::get('/register', [UserController::class, 'create']);