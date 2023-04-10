<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskController;
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

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::group([

    'middleware' => 'api',
    'prefix' => 'position'

], function ($router) {

    Route::post('create', 'PositionController@createPosition');
    Route::put('edit', 'PositionController@editPosition');
    Route::get('remove/{id}', 'PositionController@removePosition');
    Route::get('getall', 'PositionController@getPositions');
    Route::get('get/{id}', 'PositionController@getPosition');
    Route::post('setposition', 'UserController@setPosition');

});

Route::post('/user/setposition', [UserController::class, 'setPosition']);
Route::post('/register', 'UserController');


