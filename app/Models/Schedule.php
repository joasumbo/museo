<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'season',
        'day_of_week',
        'is_open',
        'morning_open',
        'morning_close',
        'afternoon_open',
        'afternoon_close',
        'notes',
    ];

    protected $casts = [
        'is_open' => 'boolean',
    ];

    public function getDayLabel(): string
    {
        return match($this->day_of_week) {
            'monday' => 'Segunda-feira',
            'tuesday' => 'Terça-feira',
            'wednesday' => 'Quarta-feira',
            'thursday' => 'Quinta-feira',
            'friday' => 'Sexta-feira',
            'saturday' => 'Sábado',
            'sunday' => 'Domingo',
            default => $this->day_of_week,
        };
    }

    public function getSeasonLabel(): string
    {
        return match($this->season) {
            'summer' => 'Verão (Abril - Setembro)',
            'winter' => 'Inverno (Outubro - Março)',
            default => $this->season,
        };
    }

    public function getFormattedHours(): string
    {
        if (!$this->is_open) {
            return 'Encerrado';
        }

        $hours = [];
        
        if ($this->morning_open && $this->morning_close) {
            $hours[] = $this->morning_open->format('H:i') . ' - ' . $this->morning_close->format('H:i');
        }
        
        if ($this->afternoon_open && $this->afternoon_close) {
            $hours[] = $this->afternoon_open->format('H:i') . ' - ' . $this->afternoon_close->format('H:i');
        }

        return implode(' | ', $hours) ?: 'Horário não definido';
    }

    public static function getCurrentSeason(): string
    {
        $month = now()->month;
        return ($month >= 4 && $month <= 9) ? 'summer' : 'winter';
    }

    public function scopeBySeason($query, string $season)
    {
        return $query->where('season', $season);
    }

    public function scopeCurrentSeason($query)
    {
        return $query->where('season', self::getCurrentSeason());
    }
}
