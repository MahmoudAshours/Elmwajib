<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class LessonUser extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'lesson_user';
}
