<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
    return view('auth.login');
});

Route::get('/dashboard', [AdminController::class, 'homepage'])
->name('home');

Route::get('/news', [AdminController::class, 'users'])
->name('user');

Route::get('/manage', [AdminController::class, 'managepets'])
->name('pets');

Route::get('/notifications', [AdminController::class, 'notifications'])
->name('notification');

Route::get('/messages', [AdminController::class, 'messages'])
->name('message');

Route::get('/edit', [AdminController::class, 'editProfile'])
->name('edit');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
