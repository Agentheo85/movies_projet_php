<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\movieController;

Route::get('/movies', [movieController::class, 'index']);
Route::get('/movies', [movieController::class, 'show']);
