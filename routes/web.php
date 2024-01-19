<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\QuoteController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

require __DIR__.'/auth.php';

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::group(
    ['prefix' => 'dashboard', 'middleware' => ['auth', 'verified'], 'as' => 'dashboard.'],
    function () {
        Route::get('/', fn () => Inertia::render('Dashboard'))->name('main');
        Route::get('/quotes', [QuoteController::class, 'index'])->name('quotes');
        Route::resource('/favorites', FavoriteController::class);
    }
);

/*
Route::get('/dashboard', fn () => Inertia::render('Dashboard'))->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/quotes', [QuoteController::class, 'index'])->middleware(['auth', 'verified'])->name('quotes');
*/

