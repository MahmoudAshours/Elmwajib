<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use JsonException;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $casts = [
        'options' => 'array'
    ];

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    /**
     * @throws JsonException
     */
    public function getOptionsAttribute($value)
    {
        $options = json_decode($value, true, 512, JSON_THROW_ON_ERROR);
        $options[] = $this->attributes['correct_answer'];
        shuffle($options);
        return $options;
    }

    /**
     * @throws JsonException
     */
    public function getOptionsOnlyAttribute()
    {
        return json_decode($this->getRawOriginal('options'), true, 512, JSON_THROW_ON_ERROR);
    }
}
