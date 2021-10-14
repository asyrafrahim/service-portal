<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/services', 'ServiceController@index')->name('services:index');
// Route::get('/services/create', 'ServiceController@create')->name('services:create');
// Route::post('/services/create', 'ServiceController@store')->name('services:store');
// Route::get('/services/edit/{services}', 'ServiceController@edit')->name('services:edit');
// Route::post('/services/edit/{services}', 'ServiceController@update')->name('services:update');
Route::resource('services', ServiceController::class);
Route::resource('categories', CategoryController::class);
Route::resource('appointments', AppointmentController::class);
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');