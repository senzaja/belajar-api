<?php

use App\Http\Controllers\Api\AktorController;
use App\Http\Controllers\Api\FilmController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\KategoriController;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// cara ke 1 //

// route / endpoint kategori
// Route::get('kategori', [KategoriController::class, 'index']);
// Route::post('kategori', [KategoriController::class, 'store']);
// Route::get('kategori/{id}', [KategoriController::class, 'show']);
// Route::put('kategori/{id}', [KategoriController::class, 'update']);
// Route::delete('kategori/{id}', [KategoriController::class, 'destroy']);

// cara ke 2 //
route::middleware(['auth:sanctum'])->group(function () {
route::post('logout',[AuthController::class, 'logout']);
route::resource('kategori', KategoriController::class);
route::resource('genre', GenreController::class);
route::resource('aktor', AktorController::class);
route::resource('film', FilmController::class);
});
// auth//
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
