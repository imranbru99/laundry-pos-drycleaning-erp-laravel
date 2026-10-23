<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopSetting extends Model
{
    protected $fillable = ['key', 'value', 'json_value'];

    protected $casts = [
        'json_value' => 'array',
    ];

    public static function get(string $key, mixed $default = null): mixed
    {
        $setting = static::where('key', $key)->first();
        if (!$setting) {
            return $default;
        }

        return $setting->json_value ?? $setting->value ?? $default;
    }

    public static function isModuleEnabled(string $moduleKey): bool
    {
        $modules = static::get('enabled_modules', [
            'module_pos' => true,
            'module_online_booking' => true,
            'module_home_delivery' => true,
            'module_barcode_tags' => true,
            'module_inventory' => true,
            'module_attendance' => true,
            'module_ai_assistant' => true,
            'module_sms_notification' => true,
            'module_accounts_expenses' => true,
            'module_multi_branch' => true,
        ]);

        return (bool) ($modules[$moduleKey] ?? true);
    }
}
