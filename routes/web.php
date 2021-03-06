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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'App\HTTP\Controllers\ManageApplicationController@showDashboard')->name('showData')->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/add','App\HTTP\Controllers\ManageApplicationController@getAdd')->name('getAdd');
Route::middleware(['auth:sanctum', 'verified'])->post('/addApp', 'App\HTTP\Controllers\ManageApplicationController@addApplication')->name('addApplication');
Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}','App\HTTP\Controllers\ManageApplicationController@getEdit')->name('getEdit');
Route::middleware(['auth:sanctum', 'verified'])->post('/editApp/{id}', 'App\HTTP\Controllers\ManageApplicationController@editApplication')->name('editApplication');
Route::middleware(['auth:sanctum', 'verified'])->get('/delete/{id}','App\HTTP\Controllers\ManageApplicationController@getDelete')->name('getDelete');
Route::middleware(['auth:sanctum', 'verified'])->post('/deleteApp/{id}', 'App\HTTP\Controllers\ManageApplicationController@deleteApplication')->name('deleteApplication');
Route::middleware(['auth:sanctum', 'verified'])->get('/addFavorite/{id}', 'App\HTTP\Controllers\ManageApplicationController@addFavorite')->name('addFavorite');

