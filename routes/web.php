<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CassetteController;
use App\Http\Controllers\Api\RentalController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', function() {
        return view('dashboard');
    });

    // API "local" para o dashboard
    Route::prefix('api')->group(function() {
        Route::get('/cassettes', [CassetteController::class, 'index']);
        Route::get('/rentals', [RentalController::class, 'index']);
        Route::post('/rentals', [RentalController::class, 'store']);
        Route::post('/rentals/{id}/return', [RentalController::class, 'return']);
    });
});

require __DIR__.'/settings.php';
