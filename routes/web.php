<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

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
// All Listings
Route::get('/', [CourseController::class, 'index'] );

//Single Listing
Route::get('/course',[CourseController::class, 'show']);

//Store Listing Data
Route::post('/courses/create', [CourseController::class, 'store']);


//Show Create Form
Route::get('/courses/create', [CourseController::class, 'create']);
