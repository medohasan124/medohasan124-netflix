<?php

use App\Http\Controllers\permission;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware([
    'localeSessionRedirect',
    'localizationRedirect',
    'localeViewPath',
     'auth',
    // 'role:SuperAdmin|Admin'
])
->prefix(LaravelLocalization::setLocale())
->group(function(){
    Route::name('admin.')
            ->prefix('admin')
            ->group(function(){

                Route::get('dashboard', function () {
                    return view('admin.dashboard.index');
                })->name('dashboard');

                //Roles Routes
                Route::post('roles/bulckDelete',[RoleController::class,'bulckDelete'])->name('roles.bulckDelete');
                Route::get('roles/data',[RoleController::class,'data'])->name('roles.data');
                Route::resource('roles',RoleController::class)->names('roles');

                //Users Routes
                Route::post('users/bulckDelete',[UserController::class,'bulckDelete'])->name('users.bulckDelete');
                Route::get('users/data',[UserController::class,'data'])->name('users.data');
                Route::resource('users',UserController::class)->names('users');

                Route::get('permission/data',[permission::class,'data'])->name('permission.data');
                Route::resource('permission',permission::class)->names('permission');

            });
});






    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('welcome');
});
