<?php

namespace App\Models;

use App\Traits\HasThumbnail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Subject extends Model
{
    use HasFactory, SoftDeletes, HasThumbnail;

    protected $guarded = ['id'];

    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }

    public function getTitleAttribute($value): string|null
    {
        return Str::remove([':', '.'], $value);
    }
}
