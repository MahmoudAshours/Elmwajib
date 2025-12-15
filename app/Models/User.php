<?php

namespace App\Models;

use App\Traits\HasThumbnail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens , HasFactory , Notifiable , HasRoles , HasThumbnail;

    protected $fillable = [ 'name' , 'email' , 'password' , 'gender' , 'phone' , 'country' ];

    protected $hidden = [ 'password' , 'remember_token' ];

    protected $casts = [ 'email_verified_at' => 'datetime' ];

    public function lessons () : BelongsToMany
    {
        return $this->belongsToMany(Lesson::class , 'lesson_user')
            ->withPivot([ 'completed' , 'passed' , 'score' , 'attempts' ])
            ->withTimestamps();
    }

    public function passedLessons () : BelongsToMany
    {
        return $this->belongsToMany(Lesson::class , 'lesson_user' , 'user_id')
            ->withPivot([ 'completed' , 'passed' , 'score' , 'attempts' ])
            ->where('user_id' , auth()->id())
            ->where('passed' , true);
    }

    public function scopeWithLessonsCount ($query)
    {
        return $query->withCount([
            'lessons as fail_lessons'     => function ($query) {
                $query->where('passed' , false);
            } , 'lessons as pass_lessons' => function ($query) {
                $query->where('passed' , true);
            }
        ]);
    }

    public function scopeWithReadingRate ($query)
    {
        $readingLessons = $query->withCount([
            'lessons as reading_rate' => function ($query) {
                $query->where('completed' , true);
            }
        ])->orderByDesc('pass_lessons')->take(8)->get();

        $lessonsCount = Lesson::count();

        if ($lessonsCount) {
            $readingLessons->map(function ($user) use ($lessonsCount) {
                return $user->reading_rate = $user->reading_rate / $lessonsCount * 100;
            });
        }

        return $readingLessons;
    }

    public function getRoleAttribute ()
    {
        return $this->getRoleNames()->first();
    }

    public function isCompletedTopic (Topic $topic) : bool
    {
        $topic_lessons = array_key_exists('lessons' , $topic->getRelations())
            ? $topic->lessons->where('summary' , '!=' , null)->pluck('id')
            : $topic->lessons()->whereNotNull('summary')->pluck('lessons.id');

        $topic_passed_lessons_count = array_key_exists('passedLessons' , $this->getRelations())
            ? $this->passedLessons->whereIn('id' , $topic_lessons)->count()
            : $this->passedLessons()->whereIn('lessons.id' , $topic_lessons)->count();

        return $topic_lessons->count() === $topic_passed_lessons_count;
    }

    public function isLessonPassed (Lesson $lesson) : bool
    {
        return array_key_exists('passedLessons' , $this->getRelations())
            ? $this->passedLessons->contains('id' , $lesson->id)
            : $this->passedLessons()->where('lessons.id' , $lesson->id)->exists();
    }

    public function certificates () : HasMany
    {
        return $this->hasMany(Certificate::class);
    }
}
