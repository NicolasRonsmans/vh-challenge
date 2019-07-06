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
    $questions = App\Question::all();

    return view('pages/home', ['title' => 'Home', 'questions' => $questions]);
});

Route::get('questions/{id}', function ($question_id) {
    return view('pages/question', ['title' => "Question $question_id"]);
});
