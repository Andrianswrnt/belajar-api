<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AktorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilmController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::get('kategori',[KategoriController::class,'index']);
// Route::post('kategori', [KategoriController::class, 'store']);
// Route::get('kategori/{id}', [KategoriController::class, 'show']);
// Route::put('kategori/{id}', [KategoriController::class, 'update']);
// Route::delete('kategori/{id}', [KategoriController::class, 'destroy']);

// Route::get('aktor',[AktorController::class,'index']);
// Route::post('aktor', [AktorController::class, 'store']);
// Route::get('aktor/{id}', [AktorController::class, 'show']);
// Route::put('aktor/{id}', [AktorController::class, 'update']);
// Route::delete('aktor/{id}', [AktorController::class, 'destroy']);

// Route::resource('genre',[GenreController::class,'index']);
// Route::post('genre', [GenreController::class, 'store']);
// Route::get('genre/{id}', [GenreController::class, 'show']);
// Route::put('genre/{id}', [GenreController::class, 'update']);
// Route::delete('genre/{id}', [GenreController::class, 'destroy']);

Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('kategori', KategoriController::class);
    Route::resource('genre', GenreController::class);
    Route::resource('aktor', AktorController::class);
    Route::resource('film', FilmController::class);

});
