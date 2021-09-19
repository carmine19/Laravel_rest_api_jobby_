<?php


use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\JobsController;
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


Route::get('author', [AuthorController::class, 'index']);
Route::get('author/{id}', [AuthorController::class, 'show']);
Route::get('jobs', [JobsController::class, 'index']);
Route::get('job/{id}', [JobsController::class, 'show']);

