<?php

use App\Http\Controllers\Api\v1\Auth\LoginController;
use App\Http\Controllers\Api\v1\Auth\LogoutController;
use App\Http\Controllers\Api\v1\Auth\RegistrationController;
use App\Http\Controllers\Api\v1\Task\CreateTaskController;
use App\Http\Controllers\Api\v1\Task\GetTaskController;
use App\Http\Controllers\Api\v1\Task\GetTasksController;
use App\Http\Controllers\Api\v1\Task\UpdateTaskController;
use App\Http\Controllers\Api\v1\Task\UpdateTaskStatusController;
use App\Http\Controllers\Api\v1\User\GetController;
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

Route::group(['prefix' => 'user', 'middleware' => 'auth:api'], function () {
    Route::get('/', GetController::class)->name('user.get');
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('register', RegistrationController::class)->name('auth.register');
    Route::post('login', LoginController::class)->name('auth.login');
    Route::middleware('auth:api')->delete('logout', LogoutController::class)->name('auth.logout');
});

Route::group(['prefix' => 'task', 'middleware' => ['auth:api']], function () {
    Route::get('/', GetTasksController::class)->name('task.get');
    Route::post('/', CreateTaskController::class)->name('task.create');
    Route::get('{task}', GetTaskController::class)->can('view', 'task')->name('task.get-by-id');
    Route::put('{task}', UpdateTaskController::class)->can('update', 'task')->name('task.update');
    Route::put('status/{task}', UpdateTaskStatusController::class)->can('update', 'task')->name('task.update-status');
    Route::delete('{task}', UpdateTaskController::class)->can('delete', 'task')->name('task.update');
});
