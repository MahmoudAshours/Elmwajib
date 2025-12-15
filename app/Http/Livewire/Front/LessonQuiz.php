<?php

namespace App\Http\Livewire\Front;

use App\Events\TopicCompleted;
use App\Models\Certificate;
use App\Models\Lesson;
use App\Models\LessonUser;
use Livewire\Component;
use SEO;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class LessonQuiz extends Component
{
    public $lesson;
    public $answers = [];
    public $score = 0;
    public $questionsCount;
    protected $successRate = 70;
    public $showResult = false;
    public $correctQuestions = [];
    public $completed = false;
    public $lessonUser;
    public $completedTopic = false;
    public $topic;

    protected $queryString = [
        'completed' => ['except' => 1]
    ];

    public function mount(Lesson $lesson)
    {
        if (!$lesson->questions()->exists()) {
            $this->redirect(route('lessons.content', ['lesson' => $lesson, 'next' => true]));
        }

        SEO::setTitle(__('Quiz 2') . " $lesson->title");
        SEO::setDescription('أسئلة عن ' . $lesson->title . ' اختبر نفسك وحدد مستواك بشكل مباشر من خلال هذا الاختبار');

        $this->queryString = [
            'completed' => ['except' => $this->completed],
        ];

        $this->topic = $this->lesson->topic;

        if ($user = auth()->user()) {

            $this->lessonUser = LessonUser::firstOrCreate([
                'lesson_id' => $lesson->id,
                'user_id' => $user->id
            ]);

            if ($this->completed && !$this->lessonUser->completed) {
                $this->lessonUser->update([
                    'completed' => true
                ]);
            }

            $this->completedTopic = $user->isCompletedTopic($this->topic);

        }

        $lesson->load('questions')->loadCount('questions');
        $this->questionsCount = $lesson->questions_count;
        $this->lesson = $lesson;
    }

    public function render()
    {
        return view('livewire.front.lesson-quiz')
            ->extends('front.layout')
            ->section('content');
    }

    public function submit(): void
    {
        $user = auth()->user();

        $lessonQuestions = $this->lesson->questions()->pluck('correct_answer', 'id')->toArray();

        foreach ($lessonQuestions as $questionId => $correctAnswer) {

            if (array_key_exists($questionId, $this->answers) && $this->sanetizeText($this->answers[$questionId]) === $this->sanetizeText($correctAnswer)) {
                ++$this->score;
                $this->correctQuestions[] = $questionId;
            }
        }

        $result = ($this->score / $this->questionsCount * 100) >= $this->successRate;

        $this->showResult = true;

        if ($user) {
            $this->lessonUser->update([
                'score' => $this->score > $this->lessonUser->score ? $this->score : $this->lessonUser->score,
                'passed' => $result,
                'completed' => $result,
                'attempts' => ++$this->lessonUser->attempts
            ]);

            $this->completedTopic = $user->isCompletedTopic($this->topic);

            TopicCompleted::dispatchIf($user->isCompletedTopic($this->topic), $this->topic);
        }

        $this->emit('quizCompleted', ['score' => $this->score, 'questions_count' => $this->questionsCount, 'result' => $result]);
    }

    public function downloadCertificate(): BinaryFileResponse|bool
    {
        if ($this->completedTopic && auth()->check()) {

            $certificate = Certificate::firstOrCreate([
                'topic_id' => $this->topic->id,
            ], [
                'user_id' => auth()->id(),
            ]);

            if ($certificate->needs_update) {
                $certificate->delete();
                $certificate = Certificate::create([
                    'topic_id' => $this->topic->id,
                    'user_id' => auth()->id(),
                ]);
            }

            $result = ($this->score / $this->questionsCount * 100) >= $this->successRate;

            $this->emit('certificateDownloaded', ['score' => $this->score, 'questions_count' => $this->questionsCount, 'result' => $result]);

            $certificate_url = storage_path('app/public/' . $certificate->getRawOriginal('url'));

            $certificate_name = "{$this->topic->code}." . extension($certificate_url);

            $headers = [
                'Cache-Control' => 'no-cache, must-revalidate , no-store',
            ];

            return response()->download($certificate_url, $certificate_name, $headers);

        }

        return false;
    }

    public function sanetizeText($text): array|string|null
    {
        return str_replace(array('ِ', 'ُ', 'ٓ', 'ٰ', 'ْ', 'ٌ', 'ٍ', 'ً', 'ّ', 'َ'), '', preg_replace('/[\x00-\x1F\x7F]/u', '', $text));

    }
}
