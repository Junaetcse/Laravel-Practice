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

Route::get('/send/email', 'HomeController@mail');
Route::get('/sql', 'HomeController@sql');
Route::get('/notification', 'HomeController@mailNotification');
Route::get('/collection', 'LaravelCollection@index');
Route::get('/soft-delete', 'HomeController@softDeleteExample');
Route::get('/relationship', 'RelationController@ormRelation');


