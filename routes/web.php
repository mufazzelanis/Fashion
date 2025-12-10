<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\WelcomeController;



// Frontend Welcome Route
Route::get('/', [WelcomeController::class, 'index']);
