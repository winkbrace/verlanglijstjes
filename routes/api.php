<?php

use App\Http\Controllers\WishController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function() {
    Route::name('claim-wish')->post('/wish/claim', [WishController::class, 'claim']);
    Route::name('delete-wish')->post('/wish/delete/{id}', [WishController::class, 'destroy']);
});
