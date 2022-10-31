<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\UserController;
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

Route::prefix('/auth')->group(function () {

    Route::post('login', [LoginController::class, 'login'])->name('auth.login');
    Route::post('registration', RegistrationController::class)->name('auth.registration');

    Route::middleware('auth')->group(function () {
        Route::get('user', [LoginController::class, 'showAuthenticatedUser'])->name('auth.user');
        Route::post('logout', LogoutController::class)->name('auth.logout');
    });

});

Route::middleware('auth')->group(function () {
    Route::apiResource('users', UserController::class)->except(['create', 'destroy']);
    Route::apiResource('companies', CompanyController::class);
    Route::apiResource('companies.offices', OfficeController::class);
});

//Route::prefix('/settings')->group(function () {
//
//    Route::prefix('/leads')->group(function () {
//        Route::apiResource('/statuses', LeadStatusController::class);
//        Route::apiResource('/sources', LeadSourceController::class);
//    });
//
//    Route::prefix('/employees')->group(function () {
//        Route::apiResource('/departments', EmployeeDepartmentController::class);
//        Route::apiResource('/offices', EmployeeOfficeController::class);
//        Route::apiResource('/permissions', EmployeePermissionController::class);
//        Route::apiResource('/positions', EmployeePositionController::class);
//    });
//
//});
//
//Route::apiResource('/feedback', FeedbackController::class);

//Route::apiResource('/leads', LeadController::class);
