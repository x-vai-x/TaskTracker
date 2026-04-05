<?php
use App\Http\Controllers\Api\TaskController;

Route::prefix('tasks')->name('tasks.')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('index');
    Route::get('/create', [TaskController::class, 'create'])->name('create');
    Route::post('/update', [TaskController::class, 'update'])->name('update');
});
