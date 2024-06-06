<?php

use App\Http\Controllers\CryptoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CryptoController::class, 'index'])->name('crypto.index');
Route::get('/push-to-api', [CryptoController::class, 'push_to_api'])->name('crypto.push');
