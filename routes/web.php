<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\Settings\EmployeeDepartmentController;
use App\Http\Controllers\Settings\EmployeeOfficeController;
use App\Http\Controllers\Settings\EmployeePermissionController;
use App\Http\Controllers\Settings\EmployeePositionController;
use App\Http\Controllers\Settings\LeadSourceController;
use App\Http\Controllers\Settings\LeadStatusController;

use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/auth')->group(function () {

    Route::get('/csrf', [CsrfCookieController::class, 'show'])->name('auth.csrf');
    Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
    Route::post('/registration', RegistrationController::class)->name('auth.registration');

    Route::middleware('auth')->group(function () {
        Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
            ->middleware('signed')
            ->name('verification.verify');

        Route::get('/email/resend', [VerificationController::class, 'resend'])
            ->name('verification.resend');
    });

});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

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

    Route::apiResource('/feedback', FeedbackController::class);
    Route::apiResource('/employees', EmployeeController::class);
    Route::apiResource('/leads', LeadController::class);

});

Route::view('email', 'mails.verification', [
    'username' => 'Юрий',
    'verificationUrl' => '/email/verify/{id}/{hash}',
]);
