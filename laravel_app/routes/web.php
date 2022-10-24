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

Route::get('/todo/create', 'TodoController@create')->name('todo.create');
Route::post('/todo', 'TodoController@store')->name('todo.store');
// '/todo/store'にしない　→　RESTful
Route::get('/todo', 'TodoController@index')->name('todo.index');
Route::get('/todo/{id}', 'TodoController@show')->name('todo.show'); // URLのパラメータを受け取るルート
// 追加
Route::get('/todo/{id}/edit', 'TodoController@edit')->name('todo.edit'); // 編集画面表示用ルート
Route::put('/todo/{id}', 'TodoController@update')->name('todo.update'); // 更新処理用ルート