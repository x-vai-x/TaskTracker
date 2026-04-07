<?php
use App\Http\Controllers\Api\TaskController;

Route::prefix('tasks')->name('tasks.')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('index');
    Route::post('/update', [TaskController::class, 'update'])->name('update');
});
