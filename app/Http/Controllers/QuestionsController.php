<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Question;
use App\Http\Controllers\Controller;

class QuestionsController extends Controller
{
    public function index()
    {
        $questions = Question::orderBy('id', 'desc')->get();
        $entries = [];

        foreach ($questions as $question) {
            $entries[] = [
                'question' => $question,
                'answers' => count($question->answers)
            ];
        }

        return view('pages/home', [
            'title' => 'Home',
            'entries' => $entries
        ]);
    }

    public function view($question_id)
    {
        $question = Question::findOrFail($question_id);

        return view('pages/question', [
            'title' => $question->body,
            'question' => $question
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|min:5|ends_with:?'
        ]);

        $question = new Question();
        $question->body = $request->input('body');
        $question->save();

        return redirect()->action('QuestionsController@index');
    }
}
