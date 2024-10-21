<?php

use App\Http\Controllers\PosController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('user')->group(function () {
    Route::get('/', [PosController::class, 'index'])->name('user.index');

    Route::get('/property', [PosController::class, 'property']);

    Route::get('/property/{id}', [PosController::class, 'property_single']);
    Route::get('/property-single/{id}', [PosController::class, 'property_single']);

    Route::get('/services', [PosController::class, 'services']);
    Route::get('/services/{id}', [PosController::class, 'servis']);
    Route::get('/about', [PosController::class, 'about']);
    Route::get('/contact', [PosController::class, 'contact']);
    // Route::post('/contact', [PosController::class, 'storeContact'])->name('contact.store');
    Route::post('/contact', [PosController::class, 'storeContact'])->name('contact.submit');
    Route::get('/search', [PosController::class, 'search'])->name('user.search');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');


Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [PosController::class, 'admin'])->name('admin.index');
    Route::post('/properties/store', [PosController::class, 'store'])->name('admin.properties.store');
    Route::get('/form', [PosController::class, 'form']);
    Route::get('/tables', [PosController::class, 'tables'])->name('admin.tables');
    Route::get('/profile', [PosController::class, 'profile_admin']);

    // Properties
    Route::get('/properties/show/{id}', [PosController::class, 'show_pro'])->name('admin.properties.show');
    Route::get('/properties/edit/{id}', [PosController::class, 'edit_pro'])->name('admin.properties.edit');
    Route::put('/properties/update/{id}', [PosController::class, 'update_pro'])->name('admin.properties.update');
    Route::get('/properties/delete/{id}', [PosController::class, 'delete_pro'])->name('admin.properties.delete');
    Route::get('/properties', [PosController::class, 'properties'])->name('admin.properties.index');

    // Agent
    Route::get('/agent', [PosController::class, 'agent'])->name('admin.agent.index');
    Route::get('/agent/show/{id}', [PosController::class, 'show_agent'])->name('admin.agent.show');
    Route::get('/agent/edit/{id}', [PosController::class, 'edit_agent'])->name('admin.agent.edit');
    Route::post('/agent/update/{id}', [PosController::class, 'update_agent'])->name('admin.agent.update');
    Route::get('/agent/delete/{id}', [PosController::class, 'delete_agent'])->name('admin.agent.delete');

    // kategori
    Route::get('/kategori/show/{id}', [PosController::class, 'show_kategori']);
    Route::get('/kategori/edit/{id}', [PosController::class, 'edit_kategori'])->name('admin.kategori.edit');
    Route::get('/kategori/delete/{id}', [PosController::class, 'delete_kategori'])->name('admin.kategori.delete');

    // Users
    Route::get('/users', [PosController::class, 'users'])->name('admin.users.index');
    Route::get('/users/edit/{id}', [PosController::class, 'edit_users'])->name('admin.users.edit');
    Route::put('/users/update/{id}', [PosController::class, 'update_users'])->name('admin.users.update');
    Route::get('/users/delete/{id}', [PosController::class, 'delete_users'])->name('admin.users.delete');

    // Kategori
    Route::get('/kategori/create', [PosController::class, 'create_kategori'])->name('admin.kategori.create');
    Route::post('/kategori/store', [PosController::class, 'store_kategori'])->name('admin.kategori.store');
    Route::get('/kategori/delete/{id}', [PosController::class, 'delete_kategori'])->name('admin.kategori.delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
