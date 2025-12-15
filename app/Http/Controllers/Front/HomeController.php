<?php

namespace App\Http\Controllers\Front;

use App\Models\Sponsor;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Http\Request;
use SEO;

class HomeController extends FrontBaseController
{
    public function home ()
    {
        SEO::setTitle(__('Home'));

        $subjects = Subject::with('thumbnail')
            ->withCount('topics')
            ->take(6)
            ->get();

        $sponsors = Sponsor::with('thumbnail')->get();
        $topics = Topic::whereHas('lessons')->get();

        return view('home' , compact('subjects' , 'sponsors' , 'topics'));
    }

    public function getSearchResults (Request $request)
    {
        if ($topic_id = $request->get('topic')) {
            session()->flash('searchWithTopic' , $topic_id);
        }

        return redirect(route('search.results' , [ 'query' => $request->input_search_query ]));
    }

    public function downloadBooks ()
    {
        SEO::setTitle(__('Download Book'));

        return view('front.pages.download-book');
    }
}
