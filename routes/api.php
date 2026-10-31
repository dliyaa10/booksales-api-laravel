
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AuthController;

// Route Login
Route::post('/login', [AuthController::class, 'login']);

// Route Logout
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);


// Route yang bisa diakses semua orang
Route::apiResource('genre', GenreController::class)
    ->only(['index', 'show']);

Route::apiResource('author', AuthorController::class)
    ->only(['index', 'show']);


// Route khusus admin
Route::middleware(['auth:sanctum', 'admin'])->group(function () {

    Route::apiResource('genre', GenreController::class)
        ->only(['store', 'update', 'destroy']);

    Route::apiResource('author', AuthorController::class)
        ->only(['store', 'update', 'destroy']);

});
