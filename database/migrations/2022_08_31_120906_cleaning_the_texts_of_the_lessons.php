<?php

use App\Models\Lesson;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    private function cleanText($text): array|string
    {
        $text = preg_replace('/(<[^>]*) style=("[^"]+"|\'[^\']+\')([^>]*>)/i', '$1$3', $text);
        $text = preg_replace('/(<[^>]*) aria-level=("[^"]+"|\'[^\']+\')([^>]*>)/i', '$1$3', $text);
        $text = preg_replace('/(<[^>]*) dir=("[^"]+"|\'[^\']+\')([^>]*>)/i', '$1$3', $text);
        $text = preg_replace('/(<[^>]*) role=("[^"]+"|\'[^\']+\')([^>]*>)/i', '$1$3', $text);
        $text = strip_tags($text, ['br', 'p', 'ul', 'li', 'img']);
        $text = preg_replace('#<p(.*?)>(.*?)</p>#is', '$2<br/>', $text);
        $text = preg_replace('#(<br */?>\s*)+#i', '<br />', $text);
        $text = str_replace([' ] ', ' [ ', '((', '))', 'صلى الله عليه وسلم'], [
            ' رضي الله عنه ', ' ﷺ ', '«', '»', 'ﷺ'
        ], $text);
        $text = preg_replace('~[\r\n]+~', '', $text);
        $text = str_replace('<li>س/', '<li class="alert alert-success">س/', $text);
        $text = str_replace('<li> س/', '<li class="alert alert-success">س/', $text);

        return $text;
    }


    /* $this->cleanText()*/

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        return;
        Lesson::withTrashed()->each(fn(Lesson $lesson) => $lesson->update([
            'summary' => $this->cleanText($lesson->getRawOriginal('summary')),
            'examples_of_evidence' => $this->cleanText($lesson->getRawOriginal('examples_of_evidence')),
            'explanation' => $this->cleanText($lesson->getRawOriginal('explanation')),
            'activities' => $this->cleanText($lesson->getRawOriginal('activities')),
        ]));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
