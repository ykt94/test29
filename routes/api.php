<?php

use App\Http\Controllers\AutoModelController;
use App\Http\Controllers\BrandController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['as' => 'api.'], function () {
    Route::apiResource('brands', BrandController::class)->only(['index']);
    Route::apiResource('autoModels', AutoModelController::class)->only(['index']);
});
