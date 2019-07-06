<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Http\Controllers\Controller;

class AnswersController extends Controller
{
    public function store(Request $request, $question_id)
    {
        $request->validate([
            'body' => 'required|min:5'
        ]);

        $answer = new Answer();
        $answer->body = $request->input('body');
        $answer->question_id = $question_id;
        $answer->save();

        return redirect()->action('QuestionsController@view', $question_id);
    }
}
