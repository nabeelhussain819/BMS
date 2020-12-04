<?php

use App\Authors;
use App\Books;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
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

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

//currently commented
// ->middleware('auth')


//Books CRUD 

Route::get('/books', [BooksController::class, 'index'])->middleware('auth');

Route::get('/create_book', [BooksController::class, 'create'])->middleware('auth');

Route::post('/create_book', [BooksController::class, 'store'])->name('books.store')->middleware('auth');

Route::get('/show_book/{id}', [BooksController::class, 'show'])->middleware('auth');

Route::get('/edit_book/{id}', [BooksController::class, 'edit'])->middleware('auth');

Route::post('/edit_book', [BooksController::class, 'update'])->name('books.update')->middleware('auth');

Route::get('/delete_book/{id}', [BooksController::class, 'destroy'])->name('books.destroy')->middleware('auth');


//Authors

Route::get('/authors', [AuthorController::class, 'index'])->middleware('auth');
