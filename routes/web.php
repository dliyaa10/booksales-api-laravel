
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/admin', [AdminController::class, 'index'])
    ->name('admin');

// CREATE GENRE
Route::post('/admin/genres', [AdminController::class, 'storeGenre'])
    ->name('admin.genres.store');

// UPDATE GENRE
Route::put('/admin/genres/{id}', [AdminController::class, 'updateGenre'])
    ->name('admin.genres.update');

// DELETE GENRE
Route::delete('/admin/genres/{id}', [AdminController::class, 'destroyGenre'])
    ->name('admin.genres.destroy');

// CREATE AUTHOR
Route::post('/admin/authors', [AdminController::class, 'storeAuthor'])
    ->name('admin.authors.store');

// UPDATE AUTHOR
Route::put('/admin/authors/{id}', [AdminController::class, 'updateAuthor'])
    ->name('admin.authors.update');

// DELETE AUTHOR
Route::delete('/admin/authors/{id}', [AdminController::class, 'destroyAuthor'])
    ->name('admin.authors.destroy');
