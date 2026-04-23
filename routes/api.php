<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;

Route::get('/', fn () => ['api' => 'ok']);

Route::get('/products', [PostController::class, 'index']);

Route::fallback(function () {
    return response()->json([
        'message' => 'API route not found'
    ], 404);
});