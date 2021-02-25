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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);


Route::get('/companies',  [App\Http\Controllers\HomeController::class, 'companies']);

Route::group(['prefix'=>'admin'], function(){

    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'adminLoginForm'])->name('admin.login.form');

    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');

    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'adminLogout'])->name('admin.logout');


    Route::group(['middleware' => 'auth:admin'], function() {

        Route::get('/', function(){

            return view('admin.index');

        })->name('admin.home');

        // companies

        Route::get('/companies', [App\Http\Controllers\Admin\CompaniesController::class, 'index'])->name('admin.companies');

        Route::get('/fetch/companies', [App\Http\Controllers\Admin\CompaniesController::class, 'fetchCompanies']);

        Route::post('/companies', [App\Http\Controllers\Admin\CompaniesController::class, 'store']);

        Route::delete('/companies/{company}/delete', [App\Http\Controllers\Admin\CompaniesController::class, 'delete']);

        Route::post('/companies/{company}/update', [App\Http\Controllers\Admin\CompaniesController::class, 'update']);

        // employees

        Route::get('/employees', [App\Http\Controllers\Admin\EmployeeController::class, 'index'])->name('admin.employees');

        Route::get('/fetch/employees', [App\Http\Controllers\Admin\EmployeeController::class, 'fetchEmployees']);

        Route::post('/employees', [App\Http\Controllers\Admin\EmployeeController::class, 'store']);

        Route::delete('/employees/{employee}/delete', [App\Http\Controllers\Admin\EmployeeController::class, 'delete']);

        Route::post('/employees/{employee}/update', [App\Http\Controllers\Admin\EmployeeController::class, 'update']);
    });

});



Route::group(['prefix'=>'company'], function(){

    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'companyLoginForm'])->name('company.login.form');

    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'companyLogin'])->name('company.login');

    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'companyLogout'])->name('company.logout');

    Route::group(['middleware' => 'auth:company'], function() {

        Route::get('/', function(){

            return view('company.index');

        })->name('company.home');

        Route::get('/fetch/employees', [App\Http\Controllers\Company\EmployeeController::class, 'index']);

    });

});

Route::group(['prefix'=>'employee'], function(){

    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'employeeLoginForm'])->name('employee.login.form');

    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'employeeLogin'])->name('employee.login');

    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'employeeLogout'])->name('employee.logout');

    Route::group(['middleware' => 'auth:employee'], function() {

        Route::get('/', function(){

            return view('employee.index');

        })->name('employee.home');

        Route::get('/show', [App\Http\Controllers\Employee\AccountController::class, 'show']);

        Route::post('/profile/update', [App\Http\Controllers\Employee\AccountController::class, 'update']);

        Route::post('/change/password', [App\Http\Controllers\Employee\PasswordController::class, 'update']);


    });

});