<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\ReviewController;
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

// Route::get('/home', function () {
//     return view('home', [ProductController::class]);
// })->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/logout', function () {
        Auth::logout();
        return redirect()->route('/');
    });

    Route::get('/home', [ProductController::class, 'home'])->name('home');
    Route::get('/browse', [ProductController::class, 'browse'])->name('browse');

    Route::resource('lendings', ProductController::class)->except(['create', 'store']);
    Route::resource('reviews', ReviewController::class);
    Route::resource('products', ProductController::class);
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('products/{product}/lendings/create', [LendingController::class, 'create'])->name('lendings.create');
    Route::post('products/{product}/lendings', [LendingController::class, 'store'])->name('lendings.store');
    Route::patch('lendings/{lending}/status/{status}', [LendingController::class, 'updateStatus'])->name('lendings.updateStatus');
});

require __DIR__.'/auth.php';
