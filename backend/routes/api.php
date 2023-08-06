<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidatosController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\AreasEquipamentoController;
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

//Route::post('/image', [ImageController::class, 'store']);
//
//Route::post('/detectRG', [ImageController::class, 'detectRG']);

//Login
Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/login', function () {
    return response()->json(['error' => 'Unauthenticated'], 403);
})->name('login');;

//Candidatos
Route::get('/candidatos', [CandidatosController::class, 'listarCandidatos']);

Route::get('/candidatos/{id}', [CandidatosController::class, 'buscarCandidato']);

Route::post('/cadastrarCandidato', [CandidatosController::class, 'cadastrarCandidato']);

//Reporte
Route::get('/reporte', [ReporteController::class, 'listarReporte']);

Route::get('/reporte/{id}', [ReporteController::class, 'buscarReporte']);

Route::post('/cadastararReporte', [ReporteController::class, 'cadastararReporte']);

//Area ou Equipamento
Route::post('/cadastrarAreasEquipamento', [AreasEquipamentoController::class, 'cadastrarAreasEquipamento']);
