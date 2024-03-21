<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/about', function () {
  return view('layouts.sidebar');
});

// Logout
Route::get('/logout', [Controller::class, 'logout'])->name('logout');

Route::get('/', [Controller::class, 'loginPage'])->name('login-page');
Route::get('/sign-up', [Controller::class, 'signUpPage'])->name('sign-up-page');
Route::get('/home-page', [Controller::class, 'home'])->name('home');
Route::get('/profile', [Controller::class, 'profilePage'])->name('profile-page');

Route::get('/explore', [ViewController::class, 'explore'])->name('explore');
Route::get('/reels', [ViewController::class, 'reels'])->name('reels');
Route::get('/messages', [ViewController::class, 'messages'])->name('messages');

// Edit profile
Route::get('/edit-profile', [Controller::class, 'editProfile'])->name('edit-profile');
Route::post('/update-profile', [Controller::class, 'updateProfile'])->name('update-profile');

// Add post
Route::post('/add-post', [PostController::class, 'addPost'])->name('add-post');

Route::post('/registr-user', [Controller::class, 'signUp'])->name('registr-user');
Route::post('/login-tekseriw', [Controller::class, 'loginTekseriw'])->name('login-tekseriw');
