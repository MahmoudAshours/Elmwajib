<?php

namespace App\Http\Livewire\Front;

use App\Events\TopicCompleted;
use App\Models\Lesson;
use App\Models\LessonUser;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class LessonContent extends Component
{
    public $lesson;
    public $lesson_data = [];
    public $lesson_data_current_key = 0;
    public $is_completed_topic ;

    /* Buttons */
    public $show_prev_content_btn = true;
    public $show_next_content_btn = true;
    public $show_next_lesson_btn = false;
    public $show_start_quiz_btn = false;

    private function controlPrevBtn ()
    {
        $this->lesson_data_current_key === 0 ? $this->show_prev_content_btn = false : $this->show_prev_content_btn = true;
    }

    private function controlNextBtn ()
    {
        $this->lesson_data_current_key === count($this->lesson_data) - 1 ? $this->show_next_content_btn = false : $this->show_next_content_btn = true;
    }

    private function controlNextLessonBtnOrStartQuizBtn ()
    {
        if ($this->lesson_data_current_key === count($this->lesson_data) - 1) {
            if ($this->lesson->questions()->exists()) {
                $this->show_start_quiz_btn = true;
            }
            elseif ($this->lesson->next()) {
                $this->show_next_lesson_btn = true;
            }
        }
        else {
            $this->show_start_quiz_btn = false;
            $this->show_next_lesson_btn = false;
        }
    }

    private function pushContentInArrayIfNotEmpty () : void
    {
        $column_names = [ 'summary' , 'examples_of_evidence' , 'explanation' , 'activities' ];

        foreach ($column_names as $column_name) {
            if ($this->lesson->$column_name) {
                $data = [
                    'content_title'       => __("Lesson $column_name") ,
                    'content_description' => $this->lesson->$column_name ,
                ];
                array_push($this->lesson_data , $data);
            }
        }
    }

    private function checkIfIsCompletedTopic()
    {
        $this->is_completed_topic = false ;

        if ($user = auth()->user()) {
            $lesson_user = LessonUser::firstOrCreate([ 'user_id' => $user->id , 'lesson_id' => $this->lesson->id ]);

            $count_questions_lesson = $this->lesson->loadCount('questions')->questions_count;

            if (!$count_questions_lesson) {
                $lesson_user->update([ 'completed' => true , 'passed' => true ]);
            }

            $this->is_completed_topic = $user->isCompletedTopic($this->lesson->topic);

            TopicCompleted::dispatchIf($this->is_completed_topic , $this->lesson->topic);
        }
    }
    public function render () : View|Factory|array|Application
    {
        $this->controlPrevBtn();
        $this->controlNextBtn();
        $this->controlNextLessonBtnOrStartQuizBtn();

        return view('livewire.front.lesson-content');
    }

    public function mount ()
    {
        $this->pushContentInArrayIfNotEmpty();
        $this->checkIfIsCompletedTopic();
    }
}
