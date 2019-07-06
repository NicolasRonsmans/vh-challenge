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
    $questions = App\Question::orderBy('id', 'desc')->get();
    $entries = [];

    foreach ($questions as $question) {
        $entries[] = [
            'question' => $question,
            'answers' => count($question->answers)
        ];
    }

    return view('pages/home', ['title' => 'Home', 'entries' => $entries]);
});

Route::get('questions/{id}', function ($question_id) {
    $question = App\Question::findOrFail($question_id);

    return view('pages/question', [
        'title' => $question->body,
        'question' => $question
    ]);
});
