<?php

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

// Route::get('/category', function () {
//     return view('master/category');
// });
Route::get('/models', function () {
    return view('master/models');
});
Route::get('/make', function () {
    return view('master/make');
});

Route::get('/category', [ProfileController::class, 'category'] )->name("category");
Route::get('/models', [ProfileController::class, 'models'] )->name("models");
Route::get('/make', [ProfileController::class, 'make'] )->name("make");
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('editcategory/{id}', [ProfileController::class, 'editcategory']);
Route::put('update-category/{id}', [ProfileController::class, 'updatecategory']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/insert', [ProfileController::class, 'insert']);
Route::delete('delete-category/{id}', [ProfileController::class, 'deleted'])->name("category.destroy");

require __DIR__.'/auth.php';
