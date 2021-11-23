<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
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
    return redirect()->route('login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');

Route::post('/profile',[App\Http\Controllers\HomeController::class,'updateInformation'])->name('profile');


Route::resource('todo','App\Http\Controllers\TodoController');

Route::resource('files','App\Http\Controllers\DocumentController');
// Route::get('/file/{id}','App\Http\Controllers\DocumentController@show');
Route::get('/file/download/{file}','App\Http\Controllers\DocumentController@download');