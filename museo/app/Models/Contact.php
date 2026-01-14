<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'status',
        'admin_notes',
        'read_at',
        'replied_at',
        'replied_by',
    ];

    protected $casts = [
        'read_at' => 'datetime',
        'replied_at' => 'datetime',
    ];

    public function repliedByUser()
    {
        return $this->belongsTo(User::class, 'replied_by');
    }

    public function scopeUnread($query)
    {
        return $query->where('status', 'unread');
    }

    public function scopeRead($query)
    {
        return $query->where('status', 'read');
    }

    public function scopeReplied($query)
    {
        return $query->where('status', 'replied');
    }

    public function scopeArchived($query)
    {
        return $query->where('status', 'archived');
    }

    public function markAsRead(): void
    {
        if ($this->status === 'unread') {
            $this->update([
                'status' => 'read',
                'read_at' => now(),
            ]);
        }
    }

    public function markAsReplied(int $userId): void
    {
        $this->update([
            'status' => 'replied',
            'replied_at' => now(),
            'replied_by' => $userId,
        ]);
    }

    public function archive(): void
    {
        $this->update(['status' => 'archived']);
    }

    public function getStatusLabel(): string
    {
        return match($this->status) {
            'unread' => 'Não lido',
            'read' => 'Lido',
            'replied' => 'Respondido',
            'archived' => 'Arquivado',
            default => $this->status,
        };
    }

    public function getStatusColor(): string
    {
        return match($this->status) {
            'unread' => 'red',
            'read' => 'yellow',
            'replied' => 'green',
            'archived' => 'gray',
            default => 'gray',
        };
    }
}
