<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreSubjectRequest;
use App\Models\Subject;
use SEO;

class SubjectController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('can:manage-content');
    }

    public function index()
    {
        SEO::setTitle(__('Subjects'));

        $subjects = Subject::withCount('topics')->latest()->get();

        return view('admin.pages.subjects', compact('subjects'));
    }

    public function form(Subject $subject = null)
    {
        $title = $subject ? __('Edit Subject') . ' : ' . $subject->title : __('Add Subject');

        SEO::setTitle($title);

        return view('admin.pages.subject-form', compact('subject', 'title'));
    }

    public function store(StoreSubjectRequest $request, Subject $subject)
    {
        $model = Subject::updateOrCreate(
            ['id' => $subject->id],
            $request->validated()
        );

        $this->storeThumbnail($request, $model);

        $this->alert('success', $model->wasRecentlyCreated ? 'create' : 'update');

        return redirect(route('admin.subjects.index'));
    }

    public function delete(Subject $subject)
    {
        $subject->delete();

        $this->alert('success', 'delete');

        return redirect(route('admin.subjects.index'));
    }
}
