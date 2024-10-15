<?php

use App\Http\Controllers\PosController;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('user/index');
});

// Properties
Route::get('/property', function () {
    return view('user/properties');
});
Route::get('/property-1', function () {
    return view('user/property-single');
});

// service
Route::get('/services', function () {
    return view('user/services');
});

// about
Route::get('/about', function () {
    return view('user/about');
});

// about
Route::get('/contact', function () {
    return view('user/contact');
});


Route::prefix('user')->group(function () {
    Route::get('/', [PosController::class, 'index']);
    Route::get('/property', [PosController::class, 'property']);
    Route::get('/services', [PosController::class, 'services']);
    Route::get('/services/{id}', [PosController::class, 'servis']);
    Route::get('/about', [PosController::class, 'about']);
    Route::get('/contact', [PosController::class, 'contact']);
});


Route::get('/login', function () {
    return view('admin/login');
});

Route::prefix('admin')->group(function () {
    Route::get('/', function () {return view('admin/index');});
    Route::get('/form', [PosController::class, 'form']);
    Route::get('/table', [PosController::class, 'tables']);
    Route::get('/profile', [PosController::class, 'profile_admin']);
});