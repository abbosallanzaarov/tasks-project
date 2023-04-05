<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DoneController;
use App\Http\Controllers\Api\ForwardController;
use App\Http\Controllers\Api\TasksController;
use App\Http\Controllers\Api\UserController;
use App\Models\Done;
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
// Route::get('/test' , function (Request $request) {
//     return 'hello';
// });
// Auth Route
Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
// All users
Route::get('/users', [UserController::class, 'GetAllUsers'])->middleware('auth:sanctum');
//Tasks Route
Route::get('/my/tasks/', [TasksController::class, 'getUserTasks'])->middleware('auth:sanctum');
Route::get('/user/task/', [TasksController::class, 'myTask'])->middleware('auth:sanctum');
Route::post('add/task', [TasksController::class, 'addTask'])->middleware('auth:sanctum');
Route::get('task/show/{id}', [TasksController::class, 'showTask'])->middleware('auth:sanctum');
// Forward Task
Route::get('forward/user', [ForwardController::class, 'forwardUser'])->middleware('auth:sanctum');
Route::post('froward/add', [ForwardController::class, 'ForwardTask'])->middleware('auth:sanctum');
Route::get('forward/task/{id}', [ForwardController::class, 'forwardShow'])->middleware('auth:sanctum');
Route::get('me/forward', [ForwardController::class, 'forwardTMe'])->middleware('auth:sanctum');
// done Task
Route::get('done/task/{id}', [DoneController::class, 'doneTaskId'])->middleware('auth:sanctum');
Route::post('done/task/add', [DoneController::class, 'doneTaskAdd'])->middleware('auth:sanctum');
Route::get('answer/task/{id}', [DoneController::class, 'taskAnswerShow'])->middleware('auth:sanctum');
Route::get('answer/true/or/false/task/{id}', [DoneController::class, 'answerTrueOrFalse'])->middleware("auth:sanctum");
