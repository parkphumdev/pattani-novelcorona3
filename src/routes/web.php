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
Route::resource('/', 'PageController');
Route::post('/checkuser', 'PageController@checkuser');
Route::get('/login', 'PageController@login');
Route::get('/logout', 'PageController@logout');

// Project3atk
Route::resource('n3', 'Novelcorona3Controller')->middleware('auth');
Route::get('/n3/{id}/print', 'PrintNovelcorona3@byid')->middleware('auth');

