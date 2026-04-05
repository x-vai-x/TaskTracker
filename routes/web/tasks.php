<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\TaskController;

Route::prefix('tasks')->name('tasks.')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('index');
	Route::get('/new', [TaskController::class, 'new'])->name('new');
	Route::post('/create', [TaskController::class, 'create'])->name('create');
	Route::post('/update', [TaskController::class, 'update'])->name('update');
});

