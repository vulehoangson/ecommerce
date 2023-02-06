<?php
use Illuminate\Support\Facades\Route;

use Vulehoangson\Ecommerce\Http\Controllers\IndexController;

Route::prefix('ecommerce')
    ->as('ecommerce.')
    ->middleware(config('ecommerce.middlewares', ['web', 'middlewares']))
    ->group(function () {
        Route::get('/', [IndexController::class, 'index']);
        Route::get('/create', [IndexController::class, 'getCreateForm']);
    });
