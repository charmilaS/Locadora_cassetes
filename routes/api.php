<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CassetteController;
use App\Http\Controllers\Api\RentalController;


Route::get('/cassettes', [CassetteController::class, 'index']);
Route::post('/rentals', [RentalController::class, 'store']);
Route::post('/rentals/{id}/return', [RentalController::class, 'return']);