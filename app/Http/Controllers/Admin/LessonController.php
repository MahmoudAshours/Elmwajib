<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreLessonRequest;
use App\Models\Lesson;
use App\Models\Topic;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use SEO;

class LessonController extends AdminBaseController
{
    private const LESSONS_PATH = 'lessons';

    public function __construct ()
    {
        parent::__construct();
        $this->middleware('can:manage-content');
    }

    public function index () : View|Factory|array|Application
    {
        SEO::setTitle(__('Lessons'));

        $lessons = Lesson::withCount('questions')->latest()->get();

        return view('admin.pages.lessons' , compact('lessons'));
    }

    public function form (Lesson $lesson = null) : View|Factory|array|Application
    {
        $title = $lesson ? __('Edit Lesson') . ' : ' . summary($lesson->title) : __('Add Lesson');

        SEO::setTitle($title);

        $topics = Topic::all();

        $lessons = Lesson::all()->except($lesson?->id);

        return view('admin.pages.lesson-form' , compact('lesson' , 'title' , 'topics' , 'lessons'));
    }

    public function store (StoreLessonRequest $request , Lesson $lesson)
    {
        $data = $request->validated();

        if ($data['pdf'] ?? false) {
            $data['pdf'] = $data['pdf']->store(self::LESSONS_PATH , 'public');
        }

        $model = Lesson::updateOrCreate([ 'id' => $lesson->id ] , $data);

        $this->storeThumbnail($request , $model);

        $this->alert('success' , $model->wasRecentlyCreated ? 'create' : 'update');

        return redirect(route('admin.lessons.index'));
    }

    public function uploadImages (Request $request) : bool|JsonResponse
    {
        return $request->hasFile('file') && ($file = $request->file('file')) && $file->isValid()
            ? response()->json([ 'location' => $file->store('images' , 'public') ])
            : false;
    }

    public function delete (Lesson $lesson)
    {
        $lesson->delete();

        $this->alert('success' , 'delete');

        return redirect(route('admin.lessons.index'));
    }
}
