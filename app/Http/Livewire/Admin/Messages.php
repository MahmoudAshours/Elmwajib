<?php

namespace App\Http\Livewire\Admin;

use App\Models\Message;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use SEO;

class Messages extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_message;

    protected function getMessages()
    {
        return Message::orderBy('read')->orderByDesc('id')->paginate(10);
    }

    public function render(): View|Factory|array|Application
    {
        SEO::setTitle(__('Messages'));
        return view('livewire.admin.messages', ['messages' => $this->getMessages()])
            ->extends('admin.layout', ['title' => __('Messages')])
            ->section('content');
    }

    public function read($id): void
    {
        $this->selected_message = Message::find($id);
        $this->markAsRead();
    }

    public function markAsRead($id = null): void
    {
        if ($id) {
            $this->selected_message = Message::find($id);
        }
        $this->selected_message->markAsRead();
        $this->emit('messageMarkedAsRead');
    }
}
