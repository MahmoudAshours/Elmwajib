<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\File;

class Thumbnail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public static function boot(): void
    {
        parent::boot();
        static::deleting(function (self $thumbnail) {
            $path = storage_path("app/public/$thumbnail->url");
            if (File::exists($path)) {
                unlink($path);
            }
        });
    }

    public function thumbnailable(): morphTo
    {
        return $this->morphTo();
    }
}
