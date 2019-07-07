<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use App\Question;
use App\Http\Controllers\Controller;

class QuestionsController extends Controller
{
    public function index()
    {
        $questions = Question::orderBy('id', 'desc')->get();
        $placeholder = Arr::random([
            'Enter your question here...',
            'Write something here...',
            'Please ask anything...'
        ]);

        return view('pages/home', [
            'title' => 'Home',
            'questions' => $questions,
            'placeholder' => $placeholder
        ]);
    }

    public function view($question_id)
    {
        $question = Question::findOrFail($question_id);
        $placeholder = Arr::random([
            'Enter your answer here...',
            'Write something here...',
            'Please reply here...'
        ]);

        return view('pages/question', [
            'title' => $question->body,
            'question' => $question,
            'placeholder' => $placeholder
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
