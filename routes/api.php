<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

Route::resource('persons', PersonController::class);
Route::resource('contacts', ContactController::class);
