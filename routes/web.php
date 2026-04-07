<?php


use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;


Route::name('web.')
    ->group(function () {
		Route::get('/', [HomeController::class, 'index']);
        require __DIR__ . '/web/tasks.php';
		require __DIR__ . '/web/partials.php';
    });
