<?php

use Illuminate\Support\Facades\Route;


Route::name('web.')
    ->group(function () {
        require __DIR__ . '/web/tasks.php';
    });
