<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\Settings\EmployeeDepartmentController;
use App\Http\Controllers\Settings\EmployeeOfficeController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Settings\EmployeePermissionController;
use App\Http\Controllers\Settings\EmployeePositionController;
use App\Http\Controllers\Settings\LeadSourceController;
use App\Http\Controllers\Settings\LeadStatusController;

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
        Route::apiResource('/statuses', LeadStatusController::class);
        Route::apiResource('/sources', LeadSourceController::class);
    });

    Route::prefix('/employees')->group(function () {
        Route::apiResource('/departments', EmployeeDepartmentController::class);
        Route::apiResource('/offices', EmployeeOfficeController::class);
        Route::apiResource('/permissions', EmployeePermissionController::class);
        Route::apiResource('/positions', EmployeePositionController::class);
    });

});

Route::prefix('/auth')->group(function () {
    Route::post('/registration', RegistrationController::class)->name('auth.registration');
    Route::post('/login', LoginController::class)->name('auth.login');
});

Route::apiResource('/feedback', FeedbackController::class);
Route::apiResource('/employees', EmployeeController::class);
Route::apiResource('/leads', LeadController::class);
