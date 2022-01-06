<?php

use App\Http\Controllers\HomeController;
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

Route::middleware('auth')->group(function() {
    Route::name('add-wish')->get('/wish/add', [WishController::class, 'add']);
});

require __DIR__.'/auth.php';
