<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/admin', [AdminController::class, 'index'])
    ->name('admin');

Route::post('/admin/genres', [AdminController::class, 'storeGenre'])
    ->name('admin.genres.store');

Route::post('/admin/authors', [AdminController::class, 'storeAuthor'])
    ->name('admin.authors.store');
