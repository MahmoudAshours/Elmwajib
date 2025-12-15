<?php

namespace App\Http\Controllers\Front;

use App\Models\Subject;
use SEO;

class SubjectController extends FrontBaseController
{
    public function index ()
    {
        SEO::setTitle(__('Subjects'));

        $subjects = Subject::orderBy('id')->with('topics.lessons' , function ($query) {
            $query->withCount('questions');
        })->latest()->get();

        $user = auth()->user()?->load([
            'passedLessons' => fn ($passedLessons) => $passedLessons->select('lessons.id' , 'lessons.topic_id')
        ]);

        return view('front.pages.subjects' , compact('subjects' , 'user'));
    }

    public function show (Subject $subject)
    {
        SEO::setTitle(__('Subject 2') . " $subject->title");

        $user = auth()->user()?->load([
            'passedLessons' => fn ($passedLessons) => $passedLessons->select('lessons.id' , 'lessons.topic_id')
        ]);

        $subject->load([ 'topics.lessons' => fn ($query) => $query->withCount('questions') ]);

        return view('front.pages.subject' , compact('subject' , 'user'));
    }
}
