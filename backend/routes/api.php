<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('test', function () {
        return "Rota de teste! Esta é apenas uma rota de exemplo para verificar se está funcionando corretamente.";
    });
});

Route::post('/image', [ImageController::class, 'store']);

Route::post('/detectRG', [ImageController::class, 'detectRG']);

Route::post('/register', [AuthController::class, 'register']);

Route::post('login', [AuthController::class, 'login'])->name('login');
