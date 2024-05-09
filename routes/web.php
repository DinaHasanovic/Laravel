<?php

use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckStudent;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckModerator;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NewsFeedController;
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
Route::get('/', [PostController::class, 'home']);

//Contact Page
Route::get('/contact', [PostController::class,'contact']);

// All Posts
Route::get('/posts', [PostController::class, 'index'] );

//Store Post Data
Route::post('/posts', [PostController::class, 'store'])->middleware(['auth',CheckModerator::class]);

//Show Edit Form
Route::get('/posts/{post}/edit',[PostController::class, 'edit'])->middleware(['auth',CheckModerator::class]);

//Update Post
Route::put('/posts/{post}', [PostController::class, 'update'])->middleware(['auth',CheckModerator::class]);

//Delete Post
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->middleware(['auth',CheckModerator::class]);

//Manage Posts
Route::get('/posts/manage', [PostController::class , 'manage'])->middleware(['auth', CheckModerator::class]);

//Show Create Form
Route::get('/posts/create', [PostController::class, 'create'])->middleware(['auth',CheckModerator::class]);

//Single Post
// Route::get('/posts/{post}',[PostController::class, 'show']);
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');


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

//Promote to Moderator
Route::post('/users/{user}/promote', [UserController::class, 'promote'])->middleware(['auth',CheckAdmin::class]);

//Demote to Student
Route::post('/users/{user}/demote', [UserController::class, 'demote'])->middleware(['auth',CheckAdmin::class]);

//Apply for Moderator
Route::post('/apply-for-moderator', [NewsFeedController::class, 'applyForModerator'])->middleware('auth');


//Add NewsFeed
Route::post('/add-news-feed' , [NewsFeedController::class, 'create'])->middleware(['auth',CheckAdmin::class]);

//Delete NewsFeed
Route::delete('delete-news-feed/{feed}', [NewsFeedController::class , 'destroy'])->middleware(['auth',CheckAdmin::class]);

//Send Message
Route::post('/send-message', [NewsFeedController::class, 'sendMessage']);

//Enroll into post
// Route::post('courses/{course}/enroll',[UserController::class,'enrollStudent'])->middleware(['auth',CheckStudent::class]);


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


Route::post('/posts/{post}/comments', [PostController::class, 'storeComment'])->name('post.comments.store');


Route::get('/reply/{postId}', [PostController::class, 'showReplyForm'])->name('reply.form');

Route::post('/store-response', [PostController::class, 'storeresponses'])->name('responses.store');




