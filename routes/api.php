<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('scopes', function(Request $request) {
  return \Laravel\Passport\Passport::scopes();
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register'])->middleware(['auth:api', 'scope:create-users']);
Route::post('logout', [AuthController::class, 'logout'])->middleware(['auth:api']);

Route::get('weapons', function(Request $request) {
  return 'list weapons';
})->middleware(['auth:api', 'scope:read-weapons']);
Route::post('weapons', function(Request $request) {
  return 'read weapons';
})->middleware(['auth:api', 'scope:create-weapons']);
Route::delete('weapons', function(Request $request) {
  return 'create weapons';
})->middleware(['auth:api', 'scope:delete-weapons']);
Route::put('weapons', function(Request $request) {
  return 'update weapons';
})->middleware(['auth:api', 'scope:update-weapons']);
