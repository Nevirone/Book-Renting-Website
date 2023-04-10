<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BorrowsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/books', [BooksController::class, 'index'])->name('books');

Route::get('/dashboard', [BorrowsController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/users',
[UsersController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('users');

// Books controller
Route::get('/addBook', [BooksController::class, 'create'])->middleware(['auth', 'verified', 'admin'])->name('addBook');

Route::post('/addBook', [BooksController::class, 'store'])->middleware(['auth', 'verified', 'admin'])->name('storeBook');

Route::get('/removeBook/{id}',[BooksController::class, 'destroy'])->middleware(['auth', 'verified', 'admin'])->name('removeBook');

// Borrows controller
Route::get('/borrowBook/{id}',
[BorrowsController::class, 'create'])->middleware(['auth', 'verified'])->name('borrowBook');

Route::get('/returnBook/{id}',
[BorrowsController::class, 'destroy'])->middleware(['auth', 'verified'])->name('returnBook');

// Users controller
Route::get('/manageUser/{id}',
[UsersController::class, 'edit'])->middleware(['auth', 'verified', 'admin'])->name('manageUser');

Route::post('/manageUser/{id}',
[UsersController::class, 'update'])->middleware(['auth', 'verified', 'admin'])->name('saveUser');

Route::get('/deleteUser/{id}',
[UsersController::class, 'destroy'])->middleware(['auth', 'verified', 'admin'])->name('deleteUser');

