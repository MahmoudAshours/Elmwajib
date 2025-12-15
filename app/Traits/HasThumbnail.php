<?php


namespace App\Traits;


use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use App\Models\Thumbnail;

trait HasThumbnail
{
    public function thumbnail(): MorphOne
    {
        return $this->morphOne(Thumbnail::class, 'thumbnailable');
    }

    public function getThumbnailUrlAttribute(): string
    {
        $thumbnail_path = $this->thumbnail?->url;
        $placeholder = '/template/assets/media/avatars/placeholder-image.png';

        if($this instanceof User)
        {
            $placeholder = '/template/assets/media/avatars/user-blank.png';
        }
        

        return $thumbnail_path ? '/storage/' . $thumbnail_path : $placeholder;
    }

    public function getThumbnailIdAttribute(): string|int|null
    {
        return $this->thumbnail?->id;
    }
}
