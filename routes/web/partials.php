<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\PartialController;

Route::prefix('partials')->name('partials.')->group(function () {
    Route::get('/alert/{alertType}', [PartialController::class, 'alert'])->name('alert');
	Route::get('/priority/{priority}', [PartialController::class, 'priority'])->name('priority');
	Route::get('/status/{status}', [PartialController::class, 'status'])->name('status');
});
