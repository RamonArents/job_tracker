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
//TODO: Set this in an auth middleware
Route::get('/add','App\HTTP\Controllers\ManageApplicationController@getAdd')->name('getAdd');
Route::post('/addApp', 'App\HTTP\Controllers\ManageApplicationController@addApplication')->name('addApplication');
Route::get('/edit/{id}','App\HTTP\Controllers\ManageApplicationController@getEdit')->name('getEdit');
Route::post('/editApp/{id}', 'App\HTTP\Controllers\ManageApplicationController@editApplication')->name('editApplication');

