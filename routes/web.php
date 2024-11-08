<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::namespace('App\View\Pages\Backend')->middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

});

