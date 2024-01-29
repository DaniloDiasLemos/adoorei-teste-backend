<?php

use App\BoundedContext\Sales\Infrastructure\InBound\Http\Controllers\SaleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/sales', [SaleController::class, 'paginate']);
Route::post('/sales', [SaleController::class, 'create']);
Route::put('/sales/{id}', [SaleController::class, 'update']);
