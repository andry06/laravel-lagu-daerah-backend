<?php

use App\Http\Controllers\API\SongController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/folk-songs', [SongController::class, 'index']);
Route::post('/folk-songs', [SongController::class, 'create']);
Route::post('/folk-songs/{folkSong}', [SongController::class, 'update']);
Route::delete('/folk-songs/{folkSong}', [SongController::class, 'delete']);
