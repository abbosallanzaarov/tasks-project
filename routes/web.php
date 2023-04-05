<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CanceledController;
use App\Http\Controllers\DoneController;
use App\Http\Controllers\ForwardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});
// Admin Route
// users table
Route::get('users/index' , [UserController::class , 'index'])->name('users.index');
Route::get('users/create' , [UserController::class , 'create'])->name('users.create');
Route::post('user/add' , [UserController::class , 'store'])->name('user.add');
// end Admin Route
// users
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// task
Route::get('user/add/task' , [TasksController::class , 'index'])->name('user.addtask');
Route::post('add/task' , [TasksController::class , 'addTask'])->name('task.add');
Route::get('my/tasks' , [TasksController::class , 'myTask'])->name('my.task');
// forward
Route::get('/forward/{id}' , [ForwardController::class , 'index'])->name('forwered');
Route::get('/forwardTasks/{id}' , [ForwardController::class , 'forwardTasks'])->name('forwardTasks');
Route::get('forwered/show/{id}' , [ForwardController::class , 'forwardShow'])->name('forwered.show');
// Canceled
Route::get('canceled/task/{id}' , [CanceledController::class , 'index'])->name('canceled.task');
Route::get('canceled/show/{id}' , [CanceledController::class , 'show'])->name('task.canceled');
// Done task
Route::get('done/task{id}' , [DoneController::class , 'index'])->name('done.task');
Route::post('done/add/{id}' , [DoneController::class , 'add'])->name('done.add');
Route::get('answer/show/{id}' , [DoneController::class , 'answerShow'])->name('answer.show');
Route::get('/answer/true/{id}' , [DoneController::class , 'answerTrue'])->name('answer.true');
Route::get('/answer/false/{id}' , [DoneController::class , 'answerFalse'])->name('answer.false');

// My Forward
Route::get('/my/forward' , [ForwardController::class , 'forwardTMe'])->name('my.forwerd');
// profile
Route::get('/profile' , [ProfileController::class , 'index'])->name('profile');
Route::post('profile/update/{id}' , [ProfileController::class , 'update'])->name('profile.update');
//sort
Route::get('sort/{status}' , [TasksController::class , 'sort'])->name('sort');
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
