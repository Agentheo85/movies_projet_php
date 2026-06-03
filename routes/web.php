<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\movieController;

Route::get('/movies', [movieController::class, 'index']);
Route::get('/admin', [movieController::class, 'admin']);

Route::get('/movies/{id}', [movieController::class, 'show']);
Route::get('/movies/{id}/delete', [movieController::class, 'delete']); // post de base mais flemme de fetch js pour un projet d ecole ça marche 
Route::get('/movies/{id}/edit', [movieController::class, 'edit']); 

Route::post('/movies/create',[movieController::class, 'store'])->name('movies.create');
Route::patch('/movies/update',[movieController::class, 'update'])->name('movies.update');