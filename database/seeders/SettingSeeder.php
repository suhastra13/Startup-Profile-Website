<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            // General
            ['key' => 'site_name', 'value' => 'WokilTech', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_description', 'value' => 'Solusi Digital Terbaik', 'type' => 'textarea', 'group' => 'general'],
            // Contact
            ['key' => 'site_email', 'value' => 'hello@wokiltech.com', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'site_phone', 'value' => '+62 812 3456 7890', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'site_address', 'value' => 'Jl. Teknologi No. 45, Jakarta', 'type' => 'textarea', 'group' => 'contact'],
            ['key' => 'google_maps_embed', 'value' => 'http://google.com...', 'type' => 'textarea', 'group' => 'contact'],
            // Social
            ['key' => 'social_instagram', 'value' => 'https://instagram.com', 'type' => 'text', 'group' => 'social'],
            ['key' => 'social_linkedin', 'value' => 'https://linkedin.com', 'type' => 'text', 'group' => 'social'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
