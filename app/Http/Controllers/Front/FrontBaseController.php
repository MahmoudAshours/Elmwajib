<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class FrontBaseController extends Controller
{
    public const THUMBNAIL_PATH = 'thumbnails';
    public const ALLOWED_IMAGE_EXTENSIONS = ['jpg', 'jpeg', 'gif', 'svg'];

    public function __construct()
    {
        //
    }

    public function storeThumbnail($request, $element): bool|RedirectResponse
    {
        $thumbnail = $request->file('thumbnail');

        $remove = $request->get('thumbnail_remove');
        if ($remove && !$thumbnail && $element->thumbnail()->exists()) {
            $element->thumbnail()->delete();
            return true;
        }
        if ($thumbnail) {
            $extension = mb_strtolower($thumbnail->getClientOriginalExtension());
            if (!in_array($extension, self::ALLOWED_IMAGE_EXTENSIONS, true)) {
                return back();
            }
            $thumbnailName = pathinfo($thumbnail->getClientOriginalName(), PATHINFO_FILENAME);
            $thumbnailUrl = $thumbnail->store(self::THUMBNAIL_PATH, 'public');
            if ($element->thumbnail()->exists()) {
                $element->thumbnail()->delete();
            }
            $element->thumbnail()->create(['url' => $thumbnailUrl, 'name' => $thumbnailName]);
        }
        return true;
    }
}
