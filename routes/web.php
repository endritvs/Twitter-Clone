<?php

use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    if(!Auth::user()){
        return view('auth/login');
    }else{
        return redirect('/home');
    }
});

Route::get('/home', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/follow/{user}', [UserController::class,'follow'])->name('follow');
    Route::post('/unfollow/{user}', [UserController::class,'unfollow'])->name('unfollow');
    Route::get('/home', [UserController::class,'addFollowers'])->name('addFollowers');
    Route::get('/my-profile',[UserController::class,'profile'])->name('my-profile');
    Route::post('/add-post',[PostsController::class,'store'])->name('store.post');
    Route::get('/posts/latest', [UserController::class,'posts'])->name('posts.latest');
    Route::get('/my-posts',[UserController::class,'userPosts'])->name('my.posts');
    Route::post('/image-upload',[UserController::class,'imageUpload'])->name('image.upload');
    Route::post('/background-upload',[UserController::class,'bgUpload'])->name('bg.upload');
    Route::get('/add-friends',[UserController::class,'addMoreFollowers'])->name('more.followers');
    Route::get('/notifications',[NotificationsController::class,'index'])->name('notifications.all');
    Route::post('/posts/{post}/like', [PostsController::class, 'like'])->name('like.post');
    Route::post('/posts/{post}/dislike', [PostsController::class, 'dislike'])->name('posts.dislike');
});

require __DIR__.'/auth.php';
