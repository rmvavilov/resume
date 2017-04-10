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
use App\ResumeContact;

Route::get('/', function () {
    $contacts = ResumeContact::orderBy('type', 'asc')->where('main', 1)->get();
    return view('main', array('contacts' => $contacts));
});

Auth::routes();

Route::resource('contacts', 'ContactsController', [
    'only' => ['index']
]);

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::resource('settings', 'SettingsController');
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::post('users/{id}', 'UsersController@update')->name('users.update');
    Route::post('users/image/update', 'UsersController@updateImage')->name('users.image.update');
    Route::get('users/image/delete', 'UsersController@deleteImage')->name('users.image.delete');
    Route::post('delete', 'UsersController@deleteAccount')->name('delete');
});