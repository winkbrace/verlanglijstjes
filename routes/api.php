<?php

use App\Http\Controllers\WishController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function() {
    Route::name('claim-wish')->post('/wish/claim', [WishController::class, 'claim']);
    Route::name('delete-wish')->post('/wish/delete/{id}', [WishController::class, 'destroy']);
});
