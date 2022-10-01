<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\NewsController;
use App\Http\Controllers\Dashboard\TeamMemberController;
use App\Http\Controllers\Dashboard\UserController;

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


Route::prefix('/dashboard')->as('dashboard.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'index'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login');
    });

    Route::middleware('auth')->group(function () {

        Route::get('/',  [HomeController::class , 'index'])->name('index');

        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/profile', [UserController::class, 'edit'])->name('profile');
        Route::put('/profile', [UserController::class, 'update'])->name('update-profile');

        Route::resource('news', NewsController::class);
        Route::resource('team-members', TeamMemberController::class);
    });

});
