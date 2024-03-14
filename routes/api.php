<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//login
Route::post('user-login', [AuthController::class, 'login']);
//register
Route::post('create-user', [AuthController::class, 'register']);
//get
Route::get('users', [AuthController::class, 'get_user']);
//update
Route::put('/user-update/{id}', [AuthController::class, 'update']);
// delete 
Route::delete('/user-delete/{id}', [AuthController::class, 'delete']);
//image uplord 
Route::post('image-uplord', [AuthController::class, 'image']);
//session 
// Route::post('session-check', [AuthController::class, 'session']);