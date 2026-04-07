<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\PartialController;

Route::prefix('partials')->name('partials.')->group(function () {
    Route::get('/alert/:alertType', [PartialController::class, 'alert'])->name('alert');
});
