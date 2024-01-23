<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetController;

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
->middleware('auth')
->name('home');

//Admin Middleware
Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::get('/news', [AdminController::class, 'users'])
    ->name('user');
    
    Route::get('/manage', [AdminController::class, 'managepets'])
    ->name('pets');
    
    Route::get('/pets', [AdminController::class, 'viewList'])
    ->name('pet.list');
    
    Route::get('/notifications', [AdminController::class, 'notifications'])
    ->name('notification');
    
    Route::get('/messages', [AdminController::class, 'messages'])
    ->name('message');
    
    Route::get('/edit', [AdminController::class, 'editProfile'])
    ->name('edit');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::match(['get', 'post'], '/add/pets', [PetController::class, 'store'])
->name('add.pet');

Route::delete('/delete/{pet}', [PetController::class, 'destroy'])->name('pet.delete');

require __DIR__.'/auth.php';
