<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
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


Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');


Route::group(['middleware' => ['auth', 'permission']], function() {
       
    // User Routes
    Route::group(['prefix' => 'user'], function() {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
    });
    
    // // Role Routes
    // Route::group(['prefix' => 'role'], function() {
    //     Route::get('/', [RoleController::class, 'index'])->name('role.index');
    // });

    // Permission Route
    Route::group(['prefix' => 'permission'], function() {
        Route::get('/', [PermissionController::class, 'index'])->name('permission.index');
    });

    // // Company Route
    // Route::group(['prefix' => 'company'], function() {
    //     Route::get('/', [CompanyController::class, 'index'])->name('company.index');
    // });
});
