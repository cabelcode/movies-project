<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\MoviesController;
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

Route::get('/', [MoviesController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get( '/movie/{id}', [MoviesController::class, 'show'] )->name('movie');
Route::get( '/search', fn() => redirect('/') );
Route::post( '/search', [MoviesController::class, 'search'] )->name('search');

Route::resource('comments', CommentsController::class);

require __DIR__.'/auth.php';
