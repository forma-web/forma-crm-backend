<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('mails.profile_created', [
//        'username' => 'Тест',
//        'password' => '1234235'
//    ]);
//});
//
//Route::middleware(['auth:sanctum', 'verified'])->group(function () {
//
//    Route::prefix('/settings')->group(function () {
//
//        Route::prefix('/leads')->group(function () {
//            Route::apiResource('/statuses', LeadStatusController::class);
//            Route::apiResource('/sources', LeadSourceController::class);
//        });
//
//        Route::prefix('/employees')->group(function () {
//            Route::apiResource('/departments', EmployeeDepartmentController::class);
//            Route::apiResource('/offices', EmployeeOfficeController::class);
//            Route::apiResource('/permissions', EmployeePermissionController::class);
//            Route::apiResource('/positions', EmployeePositionController::class);
//        });
//
//    });
//
//    Route::apiResource('/feedback', FeedbackController::class);
//    Route::apiResource('/employees', EmployeeController::class);
//    Route::apiResource('/leads', LeadController::class);
//
//});
//
//Route::view('email', 'mails.verification', [
//    'username' => 'Юрий',
//    'verificationUrl' => '/email/verify/{id}/{hash}',
//]);
