<?php

use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\GenderController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\NationalityController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\ReligionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TitleController;
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
    
    // Role Routes
    Route::group(['prefix' => 'role'], function() {
        Route::get('/', [RoleController::class, 'index'])->name('role.index');
    });

    // Permission Route
    Route::group(['prefix' => 'permission'], function() {
        Route::get('/', [PermissionController::class, 'index'])->name('permission.index');
    });


    

    // General Settings

        // Country Route
        Route::group(['prefix' => 'country'], function() {
            Route::get('/', [CountryController::class, 'index'])->name('country.index');
        });

        // Province Route
        Route::group(['prefix' => 'province'], function() {
            Route::get('/', [ProvinceController::class, 'index'])->name('province.index');
        });

        // District Route
        Route::group(['prefix' => 'district'], function() {
            Route::get('/', [DistrictController::class, 'index'])->name('district.index');
        });

        // City Route
        Route::group(['prefix' => 'city'], function() {
            Route::get('/', [CityController::class, 'index'])->name('city.index');
        });

        //Nationality Routes
        Route::group(['prefix' => 'nationlity'], function() {
            Route::get('/', [NationalityController::class, 'index'])->name('nationality.index');
        });

        //Language Routes
        Route::group(['prefix' => 'language'], function() {
            Route::get('/', [LanguageController::class, 'index'])->name('language.index');
        });

        //Religion Routes
        Route::group(['prefix' => 'religion'], function() {
            Route::get('/', [ReligionController::class, 'index'])->name('religion.index');
        });

        //Title Routes
        Route::group(['prefix' => 'title'], function() {
            Route::get('/', [TitleController::class, 'index'])->name('title.index');
        });

        //Gender Routes
        Route::group(['prefix' => 'gender'], function() {
            Route::get('/', [GenderController::class, 'index'])->name('gender.index');
        });
    

    // // Company Route
    // Route::group(['prefix' => 'company'], function() {
    //     Route::get('/', [CompanyController::class, 'index'])->name('company.index');
    // });
});
