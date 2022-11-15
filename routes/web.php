<?php

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

Route::controller('App\Http\Controllers\FormController')->group(function(){
    Route::get('/', 'index')->name('form');
    Route::post('/add', 'store')->name('form.store');
});

Route::controller('App\Http\Controllers\AuthController')->group(function(){
    Route::get('login', 'index')->name('login');
    Route::get('logout', 'logout')->name('logout');
    Route::post('login', 'postLogin')->name('login.post');
});

Route::group(['middleware' => 'auth'], function(){
    // Dashboard
    Route::controller('App\Http\Controllers\DashboardController')->group(function(){
        Route::get('dashboard', 'index')->name('dashboard');
    });

    // Working Hour
    Route::controller('App\Http\Controllers\WorkingHourController')->group(function(){
        Route::get('/working-hour', 'index')->name('working.hour');
        Route::patch('/working-hour/{id}', 'update')->name('working.hour.update');
    });

    // Division
    Route::controller('App\Http\Controllers\DivisionController')->group(function(){
        Route::get('/division', 'index')->name('division');
        Route::post('/division', 'store')->name('division.store');
        Route::get('/division/delete/{id}', 'destroy')->name('division.delete');
    });

    // Employe
    Route::controller('App\Http\Controllers\EmployeController')->group(function(){
        Route::get('/employe', 'index')->name('employe');
        Route::post('/employe', 'store')->name('employe.store');
        Route::patch('/employe/{id}', 'update')->name('employe.update');
        Route::get('/employe/delete/{id}', 'destroy')->name('employe.delete');
    });

    // Attendance
    Route::controller('App\Http\Controllers\AttendanceController')->group(function(){
        Route::get('/attendance', 'index')->name('attendance');
        Route::get('/attendance/detail/{id}', 'show')->name('attendance.detail');
        Route::patch('/attendance/filter/{id}', 'filter')->name('attendance.filter');
        Route::get('/attendance/action/{employ_id}/{status}', 'action')->name('attendance.action');
        Route::get('/attendance/delete/{id}', 'destroy')->name('attendance.delete');
    });
});
