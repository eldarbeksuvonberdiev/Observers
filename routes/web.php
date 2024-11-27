<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.main');
});

// Route::resource('student',StudentController::class);
Route::resource('agent',AgentController::class);

Route::get('agent/{agent}',[AgentController::class,'subs'])->name('agent.subs');

Route::post('agent/{id}',[AgentController::class,'storeBy'])->name('agent.store_by');

Route::resource('product',ProductController::class);
