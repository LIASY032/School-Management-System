<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');


Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// User Management All Routes

Route::prefix('users')->group(function () {
    Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('user.add');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');

    Route::post('/store', [UserController::class, 'UserStore'])->name('users.store');
    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');


});
