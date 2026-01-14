<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    use HasFactory;

    protected $fillable = [
        'page',
        'url',
        'ip_address',
        'user_agent',
        'referrer',
        'country',
        'city',
        'viewed_at',
    ];

    protected $casts = [
        'viewed_at' => 'date',
    ];

    public static function track(string $page, string $url): void
    {
        self::create([
            'page' => $page,
            'url' => $url,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'referrer' => request()->header('referer'),
            'viewed_at' => now()->toDateString(),
        ]);
    }

    public function scopeToday($query)
    {
        return $query->whereDate('viewed_at', now()->toDateString());
    }

    public function scopeThisWeek($query)
    {
        return $query->whereBetween('viewed_at', [
            now()->startOfWeek()->toDateString(),
            now()->endOfWeek()->toDateString(),
        ]);
    }

    public function scopeThisMonth($query)
    {
        return $query->whereMonth('viewed_at', now()->month)
                    ->whereYear('viewed_at', now()->year);
    }

    public function scopeLastDays($query, int $days)
    {
        return $query->where('viewed_at', '>=', now()->subDays($days)->toDateString());
    }

    public static function getViewsPerDay(int $days = 30): array
    {
        return self::selectRaw('DATE(viewed_at) as date, COUNT(*) as views')
            ->where('viewed_at', '>=', now()->subDays($days)->toDateString())
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('views', 'date')
            ->toArray();
    }

    public static function getTopPages(int $limit = 10): array
    {
        return self::selectRaw('page, COUNT(*) as views')
            ->groupBy('page')
            ->orderByDesc('views')
            ->limit($limit)
            ->pluck('views', 'page')
            ->toArray();
    }
}
