<?php

namespace App\Http\Controllers\Admin;

use Symfony\Component\HttpFoundation\BinaryFileResponse;

class BackupDownloadController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:manage-content|manage-dashboard');
    }

    /**
     * Handle the incoming request.
     *
     * @param string $filename
     * @param string $download_name
     *
     * @return BinaryFileResponse
     */

    public function __invoke(string $filename, string $download_name): BinaryFileResponse
    {
        return response()->download(storage_path('app/faz-book-backup/' . decrypt($filename)), decrypt($download_name) . '.zip', ['Cache-Control' => 'no-cache, must-revalidate , no-store']);
    }
}
