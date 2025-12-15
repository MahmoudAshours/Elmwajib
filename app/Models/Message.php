<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Scope a query to only include active users.
     *
     * @param Builder $query
     * @return void
     */
    public function scopeUnread(Builder $query): void
    {
        $query->where('read', false);
    }

    public function markAsRead(): void
    {
        if (!$this->read) {
            $this->update(['read' => true]);
        }
    }
}
