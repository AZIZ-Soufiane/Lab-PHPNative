<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/', function () {
    return redirect()->route('books');
})->name('home');

Route::get('/books', [ApiController::class, 'index'])->name('books');
