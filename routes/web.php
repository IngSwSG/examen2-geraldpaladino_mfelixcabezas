<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/materiales', [App\Http\Controllers\MaterialController::class, 'store']);
Route::post('/material/{id}/actualizar', [App\Http\Controllers\MaterialController::class, 'update']);
Route::get('/materiales/lista', [App\Http\Controllers\MaterialController::class, 'index']);
