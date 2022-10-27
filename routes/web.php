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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes(['register' => false,]
     //Registration Routes...
);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(array('namespace'=>'Backend'),function (){



});

Route::resource('ringtones', 'App\Http\Controllers\Backend\RingtoneController')->middleware('auth');
Route::get('/', 'App\Http\Controllers\Frontend\RingtoneController@index');
Route::get('/ringtones/{id}/{slug}', [App\Http\Controllers\Frontend\RingtoneController::class,'show']);
Route::post('/ringtones/download/{id}', [App\Http\Controllers\Frontend\RingtoneController::class,'downloadRingtone'])->name('ringtones.download');
Route::get('/category/{id}',[\App\Http\Controllers\Frontend\RingtoneController::class,'category']);
