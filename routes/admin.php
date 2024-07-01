<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProgramsCategoryController;
use App\Http\Controllers\ProgramsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard', ["title" => "Dashboard"]);
})->middleware('auth');

Route::get('/login', function () {
    return view('admin.login');
})->name('login');

Route::post('authenticate', [AuthController::class, 'authenticate']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('programs', ProgramsController::class)->middleware('auth');
Route::resource('programs-category', ProgramsCategoryController::class)->middleware('auth');
