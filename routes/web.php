<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\GoogleOauthController;
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

Route::middleware(['auth', 'not-guest'])->group(function() {
    Route::name('add-wish')->get('/wish/add', [WishController::class, 'create']);
    Route::name('store-wish')->post('/wish/store', [WishController::class, 'store']);
    Route::name('edit-wish')->get('/wish/edit/{id}', [WishController::class, 'edit'])->whereNumber('id');
    Route::name('update-wish')->post('/wish/update/{id}', [WishController::class, 'update'])->whereNumber('id');
});

Route::name('letters')->get('/letters', [HomeController::class, 'letters']);

Route::name('mail-reminder')->get('/mail/reminder', [MailController::class, 'reminder']);

Route::name('oauth.google.redirect')->get('/oauth/google/redirect', [GoogleOauthController::class, 'redirect']);
Route::name('oauth.google.callback')->get('/oauth/google/callback', [GoogleOauthController::class, 'callback']);

require __DIR__.'/auth.php';
