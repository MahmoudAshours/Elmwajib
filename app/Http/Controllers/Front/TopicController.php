<?php

namespace App\Http\Controllers\Front;

use App\Models\Certificate;
use App\Models\Topic;
use SEO;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class TopicController extends FrontBaseController
{
    public function show(Topic $topic)
    {
        SEO::setTitle(__('Topic 2') . " $topic->title");

        $lessons = $topic->lessons()->orderBy('id')->with('thumbnail')->paginate(8);

        return view('front.pages.topic', compact('topic', 'lessons'));
    }

    public function downloadCertificate (Topic $topic) : BinaryFileResponse|bool
    {
        if (auth()->check()) {

            $certificate = Certificate::firstOrCreate([
                'topic_id' => $topic->id ,
                'user_id' => auth()->id()
            ]);

            if ($certificate->needs_update) {
                $certificate->delete();
                $certificate = Certificate::create([
                    'topic_id' => $topic->id ,
                    'user_id'  => auth()->id()
                ]);
            }


            $certificate_url = storage_path('app/public/' . $certificate->getRawOriginal('url'));

            $certificate_name = "$topic->code." . extension($certificate_url);

            $headers = [
                'Cache-Control' => 'no-cache, must-revalidate , no-store' ,
            ];

            return response()->download($certificate_url , $certificate_name , $headers);
        }

        return false;
    }

}
