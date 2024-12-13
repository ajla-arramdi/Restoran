<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('create',[CategoryController::class, 'create'])->name('create');

Route::post('/proses', [CategoryController::class, 'store'])->name('store');



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(CategoryController::class)->prefix('category')->group(function() {
        Route::get('', 'index')->name('category.index');
        Route::get('create', 'create')->name('category.create');
        Route::post('store', 'store')->name('category.store');
        Route::get('edit/{id}', 'edit')->name('category.edit');
		Route::get('delete/{id}', 'delete')->name('category.delete');
        Route::post('update/{id}', 'update')->name('category.update');
        // Route::get('/category', [CategoryController::class, 'index'])->name('category');
    });

    Route::controller(MenuController::class)->prefix('menus')->group(function () {
		Route::get('', 'index')->name('menu.index');
		Route::get('create', 'create')->name('menus.create');
		Route::post('store', 'store')->name('menus.store');
		Route::get('/menus/{menu}/edit', [MenuController::class, 'edit'])->name('menus.edit');
        Route::put('/menus/{menu}', [MenuController::class, 'update'])->name('menus.update');
        Route::delete('/menus/{menu}', [MenuController::class, 'destroy'])->name('menus.delete');
});

Route::get('/menus/create', [MenuController::class, 'create'])->name('menus.create');

});

require __DIR__.'/auth.php';
