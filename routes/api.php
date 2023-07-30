<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

Route::resource('persons', PersonController::class);
