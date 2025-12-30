<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visit extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'organization',
        'visit_date',
        'preferred_time',
        'group_size',
        'visit_type',
        'special_requests',
        'status',
        'admin_notes',
        'confirmed_by',
        'confirmed_at',
    ];

    protected $casts = [
        'visit_date' => 'date',
        'preferred_time' => 'datetime:H:i',
        'confirmed_at' => 'datetime',
    ];

    public function confirmedByUser()
    {
        return $this->belongsTo(User::class, 'confirmed_by');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    public function scopeCancelled($query)
    {
        return $query->where('status', 'cancelled');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('visit_date', '>=', now()->toDateString())
                    ->where('status', 'confirmed');
    }

    public function scopeToday($query)
    {
        return $query->whereDate('visit_date', now()->toDateString());
    }

    public function confirm(int $userId): void
    {
        $this->update([
            'status' => 'confirmed',
            'confirmed_by' => $userId,
            'confirmed_at' => now(),
        ]);
    }

    public function cancel(): void
    {
        $this->update(['status' => 'cancelled']);
    }

    public function complete(): void
    {
        $this->update(['status' => 'completed']);
    }

    public function getStatusLabel(): string
    {
        return match($this->status) {
            'pending' => 'Pendente',
            'confirmed' => 'Confirmada',
            'cancelled' => 'Cancelada',
            'completed' => 'Concluída',
            default => $this->status,
        };
    }

    public function getStatusColor(): string
    {
        return match($this->status) {
            'pending' => 'yellow',
            'confirmed' => 'green',
            'cancelled' => 'red',
            'completed' => 'blue',
            default => 'gray',
        };
    }

    public function getVisitTypeLabel(): string
    {
        return match($this->visit_type) {
            'individual' => 'Individual',
            'group' => 'Grupo',
            'school' => 'Escolar',
            'guided' => 'Visita Guiada',
            default => $this->visit_type,
        };
    }
}
