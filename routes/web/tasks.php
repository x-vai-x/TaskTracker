<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\TaskController;

Route::prefix('tasks')->name('tasks.')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('index');
});

