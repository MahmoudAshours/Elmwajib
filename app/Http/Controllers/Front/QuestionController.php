<?php

namespace App\Http\Controllers\Front;

use App\Models\Question;

class QuestionController extends FrontBaseController
{
    public function index()
    {
        $questions = Question::latest()->get();

        return view('front.pages.questions', compact('questions'));
    }

    public function show(Question $question)
    {
        $question->load('lesson');

        return view('front.pages.question', compact('question'));
    }
}
