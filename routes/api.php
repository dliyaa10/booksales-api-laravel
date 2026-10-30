<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;

Route::apiResource('genre', GenreController::class);
Route::apiResource('author', AuthorController::class);