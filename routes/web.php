<?php

use Illuminate\Support\Facades\Route;

// routes/web.php
use App\Http\Controllers\UrlController;

Route::get('/', [UrlController::class, 'index'])->name('home');
Route::post('/shorten', [UrlController::class, 'store'])->name('shorten');
Route::get('/{short_url}', [UrlController::class, 'show'])->name('redirect');


