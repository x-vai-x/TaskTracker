<?php
use App\Http\Controllers\Api\TaskController;

Route::prefix('tasks')->name('tasks.')->group(function () {
    Route::post('/update', [TaskController::class, 'update'])->name('update');
});
