<?php

namespace App\Http\Controllers\Front;

class DownloadController extends FrontBaseController
{
    public function __invoke($type)
    {

        $filePath = public_path() . '/book/' . $type . '-book.pdf';

        $statsFile = storage_path('stats/book-downloads.json');

        $headers = [
            'Cache-Control' => 'no-cache, must-revalidate , no-store'
        ];

        $data = json_decode(file_get_contents($statsFile), true, 512, JSON_THROW_ON_ERROR);

        $type === 'student' ? $data['student'] += 1 : $data['teacher'] += 1;

        file_put_contents($statsFile, json_encode($data, JSON_THROW_ON_ERROR));

        return response()->download($filePath, $type . '-book.pdf', $headers);
    }
}
