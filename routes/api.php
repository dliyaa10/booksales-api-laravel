
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\TransactionController;

// Route Login
Route::post('/login', [AuthController::class, 'login']);

// Route Logout
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);


// Route Genre yang bisa diakses semua orang
Route::apiResource('genre', GenreController::class)
    ->only(['index', 'show']);

// Route Author yang bisa diakses semua orang
Route::apiResource('author', AuthorController::class)
    ->only(['index', 'show']);


// Route khusus Admin untuk Genre dan Author
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::apiResource('genre', GenreController::class)
        ->only(['store', 'update', 'destroy']);

    Route::apiResource('author', AuthorController::class)
        ->only(['store', 'update', 'destroy']);
});


// Route Transaksi untuk Customer yang login
Route::middleware(['auth:sanctum', 'customer'])->group(function () {
    // Create transaksi
    Route::post('/transactions', [TransactionController::class, 'store']);

    // Show transaksi milik customer
    Route::get('/transactions/{id}', [TransactionController::class, 'show']);

    // Update transaksi milik customer
    Route::put('/transactions/{id}', [TransactionController::class, 'update']);
    Route::patch('/transactions/{id}', [TransactionController::class, 'update']);
});


// Route transaksi khusus Admin
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    // Read All transaksi
    Route::get('/transactions', [TransactionController::class, 'index']);

    // Destroy transaksi
    Route::delete('/transactions/{id}', [TransactionController::class, 'destroy']);
});
