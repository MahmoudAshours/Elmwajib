<?php

namespace App\Models;

use App\Traits\HasThumbnail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Lesson extends Model
{
    use HasFactory, SoftDeletes, HasThumbnail;

    protected $guarded = ['id'];

    private function cleanText($text): array|string
    {
        $text = preg_replace('/(<[^>]*) style=("[^"]+"|\'[^\']+\')([^>]*>)/i', '$1$3', $text);
        $text = preg_replace('/(<[^>]*) aria-level=("[^"]+"|\'[^\']+\')([^>]*>)/i', '$1$3', $text);
        $text = preg_replace('/(<[^>]*) dir=("[^"]+"|\'[^\']+\')([^>]*>)/i', '$1$3', $text);
        $text = preg_replace('/(<[^>]*) role=("[^"]+"|\'[^\']+\')([^>]*>)/i', '$1$3', $text);
        $text = strip_tags($text, ['br', 'p', 'ul', 'li', 'img', 'svg']);
        $text = preg_replace('#<p(.*?)>(.*?)</p>#is', '$2<br/>', $text);
        $text = preg_replace('#(<br */?>\s*)+#i', '<br />', $text);
        $text = str_replace([' ] ', ' [ ', '((', '))', 'صلى الله عليه وسلم'], [
            ' رضي الله عنه ', ' ﷺ ', '«', '»', 'ﷺ'
        ], $text);
        $text = preg_replace('~[\r\n]+~', '', $text);

        return str_replace(array('<li>س/', '<li> س/'), '<li class="alert alert-success">س/', $text);
    }

    protected static function boot(): void
    {
        parent::boot();

        static::deleting(static function (self $lesson) {
            if ($lesson->pdf) {
                unlink(storage_path("app/public/$lesson->pdf"));
            }
        });

        static::updating(static function (self $lesson) {
            if ($lesson->isDirty('pdf') && ($pdf = $lesson->getRawOriginal('pdf'))) {
                unlink(storage_path("app/public/" . $pdf));
            }
        });

        static::saving(static function (self $lesson) {
            if ($lesson->isDirty('title')) {
                $lesson->setAttribute('clean_title', removeArabicDiacritics($lesson->title));
            }
        });
    }

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(static::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(static::class, 'parent_id');
    }

    public function getContentAttribute(): object
    {
        return (object)[
            'summary' => $this->summary,
            'examples' => $this->examples_of_evidence,
            'activities' => $this->activities,
        ];
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'lesson_user')
            ->withPivot(['complete_reading', 'taking_quiz', 'score', 'quiz_status'])
            ->withTimestamps();
    }

    public function getTitleAttribute($value): string|null
    {
        return Str::remove([':', '.'], $value);
    }

    public function getHasPdfAttribute(): bool
    {
        return $this->pdf && File::exists(storage_path("app/public/$this->pdf"));
    }


    public function getSummaryAttribute($value): array|string|null
    {
        return $this->cleanText($value);
    }

    public function getExamplesOfEvidenceAttribute($value): array|string|null
    {
        return $this->cleanText($value);
    }

    public function getActivitiesAttribute($value): array|string|null
    {
        return $this->cleanText($value);
    }

    public  function next() : ?Lesson
    {

        $lesson_id = $this->id ;
        $topic_id = $this->topic_id ;
        $subject_id = $this->topic->subject_id;

        $next_lesson = null;
        $next_topic_id = null ;
        $next_subject_id_ID = null;

        if($topic_id && $subject_id)
        {
            $next_topic_id = Topic::where('subject_id',$subject_id)->where('id','>',$topic_id)->first()?->id;
        }

        if($subject_id)
        {
            $next_subject_id_ID = Subject::where('id','>',$subject_id)->first()?->topics()->first()->id;
        }

        if($next_lesson_in_same_topic = self::where('summary','!=','')->where('topic_id',$topic_id)->where('id', '>', $lesson_id)->first()){
            $next_lesson = $next_lesson_in_same_topic;
        }
        elseif($next_lesson_in_next_topic_in_same_subject = self::where('summary','!=','')->where('topic_id', $next_topic_id)->first()){
            $next_lesson = $next_lesson_in_next_topic_in_same_subject;
        }
        elseif($next_lesson_in_next_subject = self::where('summary','!=','')->where('topic_id',$next_subject_id_ID)->first())
        {
            $next_lesson = $next_lesson_in_next_subject;
        }

        return $next_lesson;
    }
}
