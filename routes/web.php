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

use Illuminate\Http\Request;

Route::get('/', 'QuestionsController@index');
Route::get('questions/{id}', 'QuestionsController@view');
Route::get('questions/', function () {
    return redirect('/');
});

Route::post('questions/', 'QuestionsController@store');
Route::post('questions/{id}/answers', 'AnswersController@store');

Route::get('spa/{route?}', function () {
    return view('spa');
})->where(['route' => '(.*)']);

Route::get('api/questions', function () {
    $questions = App\Question::all();
    $questions->load('answers');

    return $questions->toJson();
});
Route::post('api/questions', function (Request $request) {
    $question = new App\Question();
    $question->body = $request->body;
    $question->save();

    return $question->id;
});
Route::post('api/questions/{id}/answers', function (
    Request $request,
    $question_id
) {
    $answer = new App\Answer();
    $answer->body = $request->body;
    $answer->question_id = $question_id;
    $answer->save();

    return $answer->id;
});
