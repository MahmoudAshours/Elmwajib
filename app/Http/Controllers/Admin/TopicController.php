<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreTopicRequest;
use App\Models\Subject;
use App\Models\Topic;
use SEO;

class TopicController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('can:manage-content');
    }

    public function index()
    {
        SEO::setTitle(__('Topics'));

        $topics = Topic::withCount('lessons')->latest()->get();

        return view('admin.pages.topics', compact('topics'));
    }

    public function form(Topic $topic = null)
    {
        $title = $topic ? __('Edit Topic') . ' : ' . $topic->title : __('Add Topic');

        SEO::setTitle($title);

        $subjects = Subject::all();

        return view('admin.pages.topic-form', compact('topic', 'title', 'subjects'));
    }

    public function store(StoreTopicRequest $request, Topic $topic)
    {
        $model = Topic::updateOrCreate(
            ['id' => $topic->id],
            $request->validated()
        );

        $this->storeThumbnail($request, $model);

        $this->alert('success', $model->wasRecentlyCreated ? 'create' : 'update');

        return redirect(route('admin.topics.index'));
    }

    public function delete(Topic $topic)
    {
        $topic->delete();

        $this->alert('success', 'delete');

        return redirect(route('admin.topics.index'));
    }
}
