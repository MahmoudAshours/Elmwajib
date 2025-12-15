<?php

namespace App\Http\Livewire\Admin;

use App\Models\Message;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class MessagesButton extends Component
{
    protected $listeners = ['messageMarkedAsRead' => 'getMessagesCount'];
    public int $messages_count;
    public int $unread_messages_count;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->getMessagesCount();
    }

    public function getMessagesCount(): void
    {
        $this->messages_count = Message::count();
        $this->unread_messages_count = Message::unread()->count();
    }

    public function render(): View|Factory|array|Application
    {
        return view('livewire.admin.messages-button');
    }
}
