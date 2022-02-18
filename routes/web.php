<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WishController;
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

Route::name('home')->get('/', [HomeController::class, 'index']);

Route::name('wish-list')->get('/list/{name}', [WishController::class, 'index']);

Route::middleware('auth')->group(function() {
    Route::name('add-wish')->get('/wish/add', [WishController::class, 'create']);
    Route::name('add-wish')->post('/wish/add', [WishController::class, 'store']);
});

require __DIR__.'/auth.php';
