<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OtpsController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

Route::group([

    'prefix' => 'auth',

], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::post('/user/{user_id}/position', [UserController::class, 'setPosition']);
Route::post('/register', [UserController::class, 'register']);

Route::apiResource('/position', PositionController::class);
Route::get('/otps', [OtpsController::class, 'generateCode']);

Route::post('/otps', [OtpsController::class, 'store']);
Route::patch('/reset', [OtpsController::class, 'reset']);
Route::post('/code_check', [OtpsController::class, 'code_check']); // без понятия как назвать не используя глаголы
