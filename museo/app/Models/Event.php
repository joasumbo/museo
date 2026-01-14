<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'short_description',
        'image',
        'location',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'type',
        'is_featured',
        'is_active',
        'is_free',
        'price',
        'max_capacity',
        'current_registrations',
        'created_by',
    ];

    protected $casts = [
        'start_date' => 'date:Y-m-d',
        'end_date' => 'date:Y-m-d',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'is_free' => 'boolean',
        'price' => 'decimal:2',
        'start_time' => 'date',
        'end_time' => 'date'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($event) {
            if (empty($event->slug)) {
                $event->slug = Str::slug($event->title);
            }
        });
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>=', now()->toDateString());
    }

    public function scopePast($query)
    {
        return $query->where('end_date', '<', now()->toDateString())
            ->orWhere(function ($q) {
                $q->whereNull('end_date')
                    ->where('start_date', '<', now()->toDateString());
            });
    }

    public function getTypeLabel(): string
    {
        return match ($this->type) {
            'exhibition' => 'Exposição',
            'workshop' => 'Workshop',
            'conference' => 'Conferência',
            'guided_tour' => 'Visita Guiada',
            'other' => 'Outro',
            default => $this->type,
        };
    }

    public function getFormattedDateRange(): string
    {
        if ($this->end_date && $this->start_date != $this->end_date) {
            return $this->start_date->format('d/m/Y') . ' - ' . $this->end_date->format('d/m/Y');
        }
        return $this->start_date->format('d/m/Y');
    }

    public function hasAvailableSpots(): bool
    {
        if (!$this->max_capacity) {
            return true;
        }
        return $this->current_registrations < $this->max_capacity;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
