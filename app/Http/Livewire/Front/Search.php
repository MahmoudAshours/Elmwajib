<?php

namespace App\Http\Livewire\Front;

use App\Models\Lesson;
use App\Models\Topic;
use Illuminate\Http\Request;
use Livewire\Component;

class Search extends Component
{
    protected $queryString = [
        'query' => [ 'except' => '' ] ,
    ];

    public $topics;
    public $query;
    public $lessons;
    public $selectedTopics = [];

    public function mount (Request $request)
    {
        if (session()->has('searchWithTopic') && ($topic_id = session()->get('searchWithTopic'))) {
            $this->selectedTopics[] = $topic_id;
        }

        $this->topics = Topic::whereHas('lessons')->get();
    }

    public function render ()
    {
        if (mb_strlen($this->query) > 3) {

            $this->search();
        }
        else {
            $this->lessons = [];
        }

        return view('livewire.front.search');
    }

    public function updatedQuery ()
    {
        $this->reset('selectedTopics');
        $this->emit("queryUpdated");
    }

    public function removeSpacesFromQuery () : string
    {
        return trim(escapeElasticReservedChars($this->query));
    }

    private function search ()
    {
        $this->lessons = Lesson::with('parent' , 'topic.subject')
            ->where(function ($query) {
                $query->whereNotNull('explanation')
                    ->orWhereNotNull('examples_of_evidence')
                    ->orWhereNotNull('activities');
            })
            ->where(function ($query) {
                $query->where('title' , 'like' , '%' . $this->removeSpacesFromQuery() . '%')
                    ->orWhere('clean_title' , 'like' , '%' . $this->removeSpacesFromQuery() . '%')
                    ->orWhere('summary' , 'like' , '%' . $this->removeSpacesFromQuery() . '%')
                    ->orWhere('explanation' , 'like' , '%' . $this->removeSpacesFromQuery() . '%')
                    ->orWhere('examples_of_evidence' , 'like' , '%' . $this->removeSpacesFromQuery() . '%')
                    ->orWhere('activities' , 'like' , '%' . $this->removeSpacesFromQuery() . '%');
            })
            ->when(!blank($this->selectedTopics) , fn ($query) => $query->whereIn('topic_id' , $this->selectedTopics))
            ->get();
    }
}
