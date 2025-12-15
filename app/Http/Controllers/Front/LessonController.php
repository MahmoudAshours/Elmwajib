<?php

namespace App\Http\Controllers\Front;

use App\Events\TopicCompleted;
use App\Models\Certificate;
use App\Models\Lesson;
use App\Models\LessonUser;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Http\RedirectResponse;
use SEO;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class LessonController extends FrontBaseController
{
    public function index ()
    {
        $lessons = Lesson::latest();

        return view('front.pages.lessons' , compact('lessons'));
    }

    public function show (Lesson $lesson)
    {
        SEO::setTitle(__('Lesson 2') . " $lesson->title");
        SEO::setDescription('تعلم عن ' . $lesson->title . ' من خلال درس الكتروني تفاعلي.');

        return redirect(route('lessons.content' , $lesson));

        return view('front.pages.lesson' , compact('lesson'));
    }

    public function content (Lesson $lesson , $next = false)
    {

        SEO::setTitle(__('Lesson 2') . " $lesson->title");
        SEO::setDescription('تعلم عن ' . $lesson->title . ' من خلال درس الكتروني تفاعلي.');


        if ($next && $next_lesson = $lesson->next()) {
            $lesson = $next_lesson;
        }

        return view('front.pages.lesson-content' , compact('lesson'));
    }

    public function download (Lesson $lesson) : BinaryFileResponse|RedirectResponse
    {
        if ($lesson->has_pdf) {
            $filePath = storage_path("app/public/$lesson->pdf");

            return response()->download($filePath , $lesson->title . '.pdf' , [ 'Cache-Control' => 'no-cache, must-revalidate , no-store' ]);
        }
        $this->alert('error' , '');

        return back();
    }
}
