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
Route::resource('photos', 'App\Http\Controllers\Backend\PhotoController')->middleware('auth');
Route::get('/', 'App\Http\Controllers\Frontend\RingtoneController@index');
Route::get('/ringtones/{id}/{slug}', [App\Http\Controllers\Frontend\RingtoneController::class,'show']);
Route::post('/ringtones/download/{id}', [App\Http\Controllers\Frontend\RingtoneController::class,'downloadRingtone'])->name('ringtones.download');
Route::get('/category/{id}',[\App\Http\Controllers\Frontend\RingtoneController::class,'category']);



Route::get('/wallpaper',[\App\Http\Controllers\Frontend\PhotoController::class,'wallpaper']);
Route::post('download1/{id}',[\App\Http\Controllers\Frontend\PhotoController::class,'download1920x1080'])->name('download1');
Route::post('download2/{id}',[\App\Http\Controllers\Frontend\PhotoController::class,'download1280x1024'])->name('download2');
Route::post('download3/{id}',[\App\Http\Controllers\Frontend\PhotoController::class,'download316x255'])->name('download3');
Route::post('download4/{id}',[\App\Http\Controllers\Frontend\PhotoController::class,'download118x95'])->name('download4');
