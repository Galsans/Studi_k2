<?php

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
    return view('frontend.homepage');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('homepage');

Route::group(['middleware' => ['auth', 'isAdmin'], 'prefix'=>'admin'], function() {
    Route::get('/', [App\Http\Controllers\CarController::class, 'home'])->name('admin.home');

    Route::get('cars', [App\Http\Controllers\CarController::class, 'index'])->name('car.index');
    Route::get('cars-create', [App\Http\Controllers\CarController::class, 'create'])->name('car.create');
    Route::post('cars-store', [App\Http\Controllers\CarController::class, 'store'])->name('car.store');
    Route::get('cars-edit/edit/{id}', [App\Http\Controllers\CarController::class, 'edit'])->name('car.edit');
    Route::post('cars-update/{id}', [App\Http\Controllers\CarController::class, 'update'])->name('car.update');
    Route::delete('cars-delete/{id}', [App\Http\Controllers\CarController::class, 'destroy'])->name('car.destroy');


    Route::put('cars-image/update-image/{id}', [App\Http\Controllers\CarController::class, 'updateImg'])->name('car.updateImg');

    Route::get('rental', [App\Http\Controllers\RentalController::class, 'index'])->name('rental.index');
    Route::delete('rental-delete/{id}', [App\Http\Controllers\RentalController::class, 'destroy'])->name('rental.destroy');
});


Route::get('detail/{id}', [App\Http\Controllers\HomeController::class, 'detail'])->name('frontend.detail');
Route::post('rental-store', [App\Http\Controllers\RentalController::class, 'store'])->name('rental.store');


Route::get('rental', [App\Http\Controllers\RentalController::class, 'show'])->name('frontend.tambah');
