<?php

use App\Http\Controllers\PosController;
use Illuminate\Support\Facades\Route;

// Route::get('/home', function () {
//     return view('user/index');
// });

// // Properties
// Route::get('/property', function () {
//     return view('user/properties');
// });
// Route::get('/property-1', function () {
//     return view('user/property-single');
// });

// // service
// Route::get('/services', function () {
//     return view('user/services');
// });

// // about
// Route::get('/about', function () {
//     return view('user/about');
// });

// // about
// Route::get('/contact', function () {
//     return view('user/contact');
// });


Route::prefix('user')->group(function () {
    Route::get('/', [PosController::class, 'index']);

    Route::get('/property', [PosController::class, 'property']);
    Route::get('/property/{id}', [PosController::class, 'property_single']);
    Route::get('/services', [PosController::class, 'services']);
    Route::get('/services/{id}', [PosController::class, 'servis']);
    Route::get('/about', [PosController::class, 'about']);
    Route::get('/contact', [PosController::class, 'contact']);
    Route::get('/search', [PosController::class, 'search'])->name('user.search');
});


Route::get('/login', function () {
    return view('admin/login');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [PosController::class, 'admin'])->name('admin.index');
    Route::post('/properties/store', [PosController::class, 'store'])->name('admin.properties.store');
    Route::get('/form', [PosController::class, 'form']);
    Route::get('/tables', [PosController::class, 'tables']);
    Route::get('/profile', [PosController::class, 'profile_admin']);

    // Properties
    Route::get('/properties/show/{id}', [PosController::class, 'show_pro']);
    Route::get('/properties/edit/{id}', [PosController::class, 'edit_pro']);
    Route::get('/properties/delete/{id}', [PosController::class, 'delete_pro']);

    // Agent
    Route::get('/agent/show/{id}', [PosController::class, 'show_agent']);
    Route::get('/agent/edit/{id}', [PosController::class, 'edit_agent']);
    Route::get('/agent/delete/{id}', [PosController::class, 'delete_agent']);

    // kategori
    Route::get('/kategori/show/{id}', [PosController::class, 'show_kategori']);
    Route::get('/kategori/edit/{id}', [PosController::class, 'edit_kategori']);
    Route::get('/kategori/delete/{id}', [PosController::class, 'delete_kategori']);
});
