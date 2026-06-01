<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\movieController;

Route::get('/movies', [movieController::class, 'index']);
Route::get('/admin', [movieController::class, 'admin']);

Route::get('/movies/{id}', [movieController::class, 'show']);
Route::post('/movies/create',[movieController::class, 'store'])->name('movies.create');