<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users/search', [App\Http\Controllers\UserController::class, 'search'])->name('users_search');
Route::get('/users/{module}', [App\Http\Controllers\UserController::class, 'home'])->name('users_home');
Route::get('/users/trash/{user}', [App\Http\Controllers\UserController::class, 'trash'])->name('users_trash');
Route::get('/users/edit/{user}', [App\Http\Controllers\UserController::class, 'edit'])->name('users_edit');
Route::get('/users/delete/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users_destroy');
Route::put('/users/update/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users_update');


//gestion peliculas
Route::get('/movies', [App\Http\Controllers\MovieController::class, 'home'])->name('movie_home');
Route::get('/movies/create', [App\Http\Controllers\MovieController::class, 'create'])->name('movie_create');
Route::get('/movies/{module}', [App\Http\Controllers\MovieController::class, 'trash'])->name('movie_trashme');
Route::get('/movies/restore/{movie}', [App\Http\Controllers\MovieController::class, 'restore'])->name('movie_restore');
Route::post('/movies/create', [App\Http\Controllers\MovieController::class, 'store'])->name('movie_store');
Route::get('/movies/show/{movie}', [App\Http\Controllers\MovieController::class, 'show'])->name('movie_show');
Route::get('/movies/edit/{movie}', [App\Http\Controllers\MovieController::class, 'edit'])->name('movie_edit');
Route::get('/movies/delete/{movie}', [App\Http\Controllers\MovieController::class, 'destroy'])->name('movie_destroy');
Route::put('/movies/update/{movie}', [App\Http\Controllers\MovieController::class, 'update'])->name('movie_update');
