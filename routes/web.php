<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;


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

Route::get('lang/{language}',function ($language){
    session()->put('language',$language);
    return redirect()->back();
});

Auth::routes();

Route::get('/home/', 'HomeController@index')->name('home');


Route::resource('/applications','ApplicationsController')->middleware('userappkeysmiddleware');
Route::resource('/userappkeys','UserAppKeysController')->middleware('userappkeysmiddleware');


Route::get('exportApplication', 'ApplicationsController@exportApplication')->name('exportApplication');
Route::post('importApplication', 'ApplicationsController@importApplication')->name('importApplication');

Route::get('exportUserAppKeys', 'UserAppKeysController@exportUserAppKeys')->name('exportUserAppKeys');
Route::post('importUserAppKeys', 'UserAppKeysController@importUserAppKeys')->name('importUserAppKeys');


//Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
//    Route::resource('userappkeys','UserAppKeysController');
//});
