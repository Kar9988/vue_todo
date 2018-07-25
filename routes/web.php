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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


Route::get('/axios','AxiosController@index')->name('axios');



Route::post('/task/set','AxiosController@setTask')->name('task-set');

Route::post('/task/done','AxiosController@doneTask')->name('task-done');

Route::get('/tasks/all','AxiosController@allTasks')->name('task-all');

Route::delete('/tasks/destroy/{id}','AxiosController@destroy')->name('task-destroy');







Route::get('/home', 'HomeController@index')->name('home');
