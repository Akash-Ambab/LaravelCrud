<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use App\Http\Middleware\Auth;

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

Route::view('/register', 'register');
Route::view('/login', 'login');
Route::post('/register/add', [AuthController::class, 'RegisterAdmin']);
Route::post('/login/add', [AuthController::class, 'LoginAdmin']);
Route::get('/logout', [AuthController::class, 'LogoutAdmin']);

Route::group(['middleware' => Auth::class], function() {
    Route::redirect('/', '/student');
    Route::get('/student', [StudentController::class, 'index']);
    Route::post('/student', [StudentController::class, 'store']);
    Route::get('/student/{id}/edit', [StudentController::class, 'edit']);
    Route::post('/student/{id}/update', [StudentController::class, 'update']);
    Route::get('/student/{id}/delete', [StudentController::class, 'destroy']);
});
