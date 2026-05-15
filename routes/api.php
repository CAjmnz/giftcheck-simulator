<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BudgetController;
use App\Http\Controllers\Api\AdjustmentController;

Route::prefix('budget')->group(function () {

    Route::get('/', function () {
        return response()->json([
            'status' => 'API running'
        ]);
    });

    Route::post('/approve', [BudgetController::class, 'approve']);
    Route::post('/cancel', [BudgetController::class, 'cancel']);
});

Route::prefix('adjustment')->group(function () {
    Route::post('/approve', [AdjustmentController::class, 'approve']);
    Route::post('/cancel', [AdjustmentController::class, 'cancel']);
});