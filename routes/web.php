<?php

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