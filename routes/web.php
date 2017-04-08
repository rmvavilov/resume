<?php

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
//    return view('layouts.app');
    return view('main');
});

Auth::routes();

//Route::get('/home', 'HomeController@index');

Route::resource('contacts', 'ContactsController', [
    'only' => ['index']
]);


Route::group(['middleware' => ['web', 'guest']], function () {
//    Route::resource('settings', 'SettingsController');
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::resource('settings', 'SettingsController');
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::post('users/{id}', 'UsersController@update')->name('users.update');
});