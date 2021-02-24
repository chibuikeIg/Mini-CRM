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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix'=>'admin'], function(){

    Route::get('/', function(){

        return view('admin.index');

    })->name('admin.home');

    Route::get('/companies', [App\Http\Controllers\Admin\CompaniesController::class, 'index'])->name('admin.companies');

    Route::get('/fetch/companies', [App\Http\Controllers\Admin\CompaniesController::class, 'fetchCompanies']);

    Route::post('/companies', [App\Http\Controllers\Admin\CompaniesController::class, 'store']);

    Route::delete('/companies/{company}/delete', [App\Http\Controllers\Admin\CompaniesController::class, 'delete']);

});