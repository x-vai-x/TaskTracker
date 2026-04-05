<?php

use Illuminate\Support\Facades\Route;

Route::name('api.')
    ->group(function () {
        require __DIR__ . '/api/tasks.php';
    });