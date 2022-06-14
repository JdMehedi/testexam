<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AgentLoginController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/users',[UsersController::class,'list'])->name('user.list');

Route::prefix('admin')->group(function() {
    Route::get('/login',[AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login',[AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::get('logout/', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
   }) ;

Route::prefix('agent')->group(function() {
    Route::get('/login',[AgentLoginController::class, 'showLoginForm'])->name('agent.login');
    Route::post('/login',[AgentLoginController::class, 'login'])->name('agent.login.submit');
    Route::get('logout/', [AgentLoginController::class, 'logout'])->name('agent.logout');
    Route::get('/', [AgentController::class, 'index'])->name('agent.dashboard');
   }) ;