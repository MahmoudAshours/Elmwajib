<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreQuestionRequest;
use App\Models\Lesson;
use App\Models\Question;
use SEO;

class QuestionController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('can:manage-content');
    }

    public function index()
    {
        SEO::setTitle(__('Questions'));

        $questions = Question::with('lesson')->orderBy('lesson_id')->latest()->get();

        return view('admin.pages.questions', compact('questions'));
    }

    public function form(Question $question = null)
    {
        $title = $question ? __('Edit Question') . ' : ' . summary($question->title) : __('Add Question');

        SEO::setTitle($title);

        $lessons = Lesson::whereNotNull('summary')->get();

        return view('admin.pages.question-form', compact('question', 'title', 'lessons'));
    }

    public function store(StoreQuestionRequest $request, Question $question)
    {
        $data = $request->validated();

        $data['options'] = array_column($data['options'], 'body');

        $model = Question::updateOrCreate(
            ['id' => $question->id],
            $data
        );

        $this->alert('success', $model->wasRecentlyCreated ? 'create' : 'update');

        return redirect(route('admin.questions.index'));
    }

    public function delete(Question $question)
    {
        $question->delete();

        $this->alert('success', 'delete');

        return redirect(route('admin.questions.index'));
    }
}
