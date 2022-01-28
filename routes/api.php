<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Settings\LeadSourcesController;
use App\Http\Controllers\Settings\LeadStatusesController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('/settings')->group(function () {

    Route::prefix('/leads')->group(function () {
        Route::apiResource('/statuses', LeadStatusesController::class);
        Route::apiResource('/sources', LeadSourcesController::class);
    });

});

Route::apiResource('/feedback', FeedbackController::class);
