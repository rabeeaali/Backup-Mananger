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
    return view('welcome');
});


Route::get('backup', 'BackupController@index')->name('backup.index');
Route::get('backup/create','BackupController@create')->name('backup.create');
Route::get('backup/delete/{file_name}','BackupController@delete')->name('backup.delete');
