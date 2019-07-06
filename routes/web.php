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

Route::get('/', 'QuestionsController@index');
Route::get('questions/{id}', 'QuestionsController@view');
Route::get('questions/', function () {
    return redirect('/');
});

Route::post('questions/', 'QuestionsController@store');
Route::post('questions/{id}/answers', 'AnswersController@store');
