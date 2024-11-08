<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::namespace('App\View\Pages\Auth')->middleware('auth')->group(function () {
    Route::get('logout', Logout::class)->name('logout');
});
Route::namespace('App\View\Pages\Auth')->middleware('guest')->group(function () {
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
});

Route::namespace('App\View\Pages\Backend')->middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

});

