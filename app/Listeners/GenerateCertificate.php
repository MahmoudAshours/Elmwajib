<?php

namespace App\Listeners;

use App\Events\TopicCompleted;
use App\Models\Certificate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class GenerateCertificate implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param TopicCompleted $event
     *
     * @return void
     */
    public function handle(TopicCompleted $event): void
    {
        $certificate = Certificate::firstOrCreate([
            'topic_id' => $event->topic->id,
            'user_id' => $event->user->id,
        ]);

        if ($certificate->needs_update) {
            $certificate->delete();
            Certificate::create([
                'topic_id' => $event->topic->id,
                'user_id' => $event->user->id,
            ]);
        }

    }
}
