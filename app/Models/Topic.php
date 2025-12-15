<?php

namespace App\Models;

use App\Traits\HasThumbnail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Topic extends Model
{
    use HasFactory, SoftDeletes, HasThumbnail;

    protected $guarded = ['id'];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(static function (self $topic) {
            do {
                $code = Str::random(6);
            } while (Topic::where('code', $code)->exists());
            $topic->code = $code;
        });

        static::updated(static function (self $topic) {
            if ($topic->isDirty('title')) {
                $topic->certificates()->update([
                    'needs_update' => true
                ]);
            }
        });
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }

    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class);
    }

    public function getTitleAttribute($value): string|null
    {
        return Str::remove([':', '.'], $value);
    }
}
