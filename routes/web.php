<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/materiales', [App\Http\Controllers\MaterialController::class, 'store']);