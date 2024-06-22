<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\OptionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/courses', function () {
    return view('courses');
});

Route::get('/courses-details', function () {
    return view('courses-details');
});

Route::get('/instructors', function () {
    return view('instructors');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/contact-us', function () {
    return view('contact-us');
});

// ADMIN
Route::prefix('adm')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard', ["title" => "Dashboard"]);
    })->middleware('auth');

    Route::get('/login', function () {
        return view('admin.login');
    })->name('login');

    Route::post('authenticate', [AuthController::class, 'authenticate']);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('courses', CourseController::class)->middleware('auth');
    Route::resource('courses-category', CourseCategoryController::class)->middleware('auth');
});

// Route::resource('options', OptionController::class);

// Route::get('/adm', function () {
//     return view('admin.dashboard', ["title" => "Dashboard"]);
// })->middleware('auth');

// Route::get('/adm/login', function () {
//     return view('admin.login');
// })->name('login');
