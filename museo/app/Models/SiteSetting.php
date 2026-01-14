<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'label',
        'description',
    ];

    public static function get(string $key, $default = null)
    {
        return Cache::rememberForever("site_setting_{$key}", function () use ($key, $default) {
            $setting = self::where('key', $key)->first();
            return $setting ? $setting->value : $default;
        });
    }

    public static function set(string $key, $value): void
    {
        self::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
        
        Cache::forget("site_setting_{$key}");
    }

    public static function getGroup(string $group): array
    {
        return self::where('group', $group)
            ->pluck('value', 'key')
            ->toArray();
    }

    public static function clearCache(): void
    {
        $settings = self::all();
        foreach ($settings as $setting) {
            Cache::forget("site_setting_{$setting->key}");
        }
    }

    public function getValueAttribute($value)
    {
        if ($this->type === 'boolean') {
            return filter_var($value, FILTER_VALIDATE_BOOLEAN);
        }
        
        if ($this->type === 'json') {
            return json_decode($value, true);
        }
        
        return $value;
    }

    public function setValueAttribute($value): void
    {
        if ($this->type === 'json' && is_array($value)) {
            $value = json_encode($value);
        }
        
        if ($this->type === 'boolean') {
            $value = $value ? '1' : '0';
        }
        
        $this->attributes['value'] = $value;
    }
}
