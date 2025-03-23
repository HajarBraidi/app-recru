<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/create', [UserController::class, 'create']); // Correction ici
Route::post('/users/store', [UserController::class, 'store']);
