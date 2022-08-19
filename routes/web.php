<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\UserCabangController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;




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


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 Route::prefix('user')->name('user.')->group(function(){

    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.user.login')->name('login');
        Route::view('/register','dashboard.user.register')->name('register');
        Route::post('/create',[UserController::class,'create'])->name('create');
        Route::post('/check',[UserController::class,'check'])->name('check');
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.user.home')->name('home');
        Route::view('/welcome','dashboard.user.dashboard')->name('dashboard');
        Route::get('/profile','\App\Http\Controllers\User\UserController@profile')->name('profile');
        Route::post('/logout',[UserController::class,'logout'])->name('logout');

        Route::post('profileupdate', '\App\Http\Controllers\User\UserController@profileupdate')->name('profileupdate');
        Route::post('/change-password',[UserController::class,'changePassword'])->name('change-password');
        Route::post('change-profile-picture',[UserController::class,'changePicture'])->name('change-profile-picture');
        Route::post('/education','\App\Http\Controllers\User\UserController@educationupdate')->name('education');

        Route::get('cabang/{id}', '\App\Http\Controllers\UserCabangController@cabang')->name('cabang');

        Route::resource('/', '\App\Http\Controllers\UserCabangController');
    });
});

Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.admin.login')->name('login');
        Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.admin.home')->name('home');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
        Route::view('/welcome','dashboard.admin.dashboard')->name('dashboard');
        Route::post('/admincabanghimpunan/{id}','\App\Http\Controllers\UserCabangController@admincabang' )->name('admincabanghimpunan');

        Route::resource('admin/postcabang', '\App\Http\Controllers\CabangController');
        
    });
});




 