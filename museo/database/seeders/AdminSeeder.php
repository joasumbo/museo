<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Schedule;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::updateOrCreate(
            ['email' => 'admin@museu-alcanena.pt'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'is_active' => true,
            ]
        );

        // Create default schedules for summer season
        $summerSchedule = [
            ['day_of_week' => 'monday', 'is_open' => false],
            ['day_of_week' => 'tuesday', 'morning_open' => '09:30', 'morning_close' => '12:30', 'afternoon_open' => '14:00', 'afternoon_close' => '18:00', 'is_open' => true],
            ['day_of_week' => 'wednesday', 'morning_open' => '09:30', 'morning_close' => '12:30', 'afternoon_open' => '14:00', 'afternoon_close' => '18:00', 'is_open' => true],
            ['day_of_week' => 'thursday', 'morning_open' => '09:30', 'morning_close' => '12:30', 'afternoon_open' => '14:00', 'afternoon_close' => '18:00', 'is_open' => true],
            ['day_of_week' => 'friday', 'morning_open' => '09:30', 'morning_close' => '12:30', 'afternoon_open' => '14:00', 'afternoon_close' => '18:00', 'is_open' => true],
            ['day_of_week' => 'saturday', 'morning_open' => '14:00', 'morning_close' => null, 'afternoon_open' => null, 'afternoon_close' => '18:00', 'is_open' => true],
            ['day_of_week' => 'sunday', 'is_open' => false],
        ];

        // Create default schedules for winter season
        $winterSchedule = [
            ['day_of_week' => 'monday', 'is_open' => false],
            ['day_of_week' => 'tuesday', 'morning_open' => '09:30', 'morning_close' => '12:30', 'afternoon_open' => '14:00', 'afternoon_close' => '17:30', 'is_open' => true],
            ['day_of_week' => 'wednesday', 'morning_open' => '09:30', 'morning_close' => '12:30', 'afternoon_open' => '14:00', 'afternoon_close' => '17:30', 'is_open' => true],
            ['day_of_week' => 'thursday', 'morning_open' => '09:30', 'morning_close' => '12:30', 'afternoon_open' => '14:00', 'afternoon_close' => '17:30', 'is_open' => true],
            ['day_of_week' => 'friday', 'morning_open' => '09:30', 'morning_close' => '12:30', 'afternoon_open' => '14:00', 'afternoon_close' => '17:30', 'is_open' => true],
            ['day_of_week' => 'saturday', 'morning_open' => '14:00', 'morning_close' => null, 'afternoon_open' => null, 'afternoon_close' => '17:30', 'is_open' => true],
            ['day_of_week' => 'sunday', 'is_open' => false],
        ];

        foreach ($summerSchedule as $schedule) {
            Schedule::updateOrCreate(
                ['season' => 'summer', 'day_of_week' => $schedule['day_of_week']],
                $schedule
            );
        }

        foreach ($winterSchedule as $schedule) {
            Schedule::updateOrCreate(
                ['season' => 'winter', 'day_of_week' => $schedule['day_of_week']],
                $schedule
            );
        }

        // Create default site settings
        $settings = [
            // Contact
            ['key' => 'contact_email', 'value' => 'museu@cm-alcanena.pt', 'label' => 'Email de Contacto', 'group' => 'contact', 'type' => 'string'],
            ['key' => 'contact_phone', 'value' => '+351 249 880 150', 'label' => 'Telefone', 'group' => 'contact', 'type' => 'string'],
            ['key' => 'contact_address', 'value' => 'Rua Dr. Augusto César Pereira, 2380-037 Alcanena', 'label' => 'Morada', 'group' => 'contact', 'type' => 'string'],
            ['key' => 'google_maps_url', 'value' => 'https://maps.google.com/?q=Museu+Municipal+Alcanena', 'label' => 'Link Google Maps', 'group' => 'contact', 'type' => 'string'],
            
            // Social
            ['key' => 'facebook_url', 'value' => 'https://www.facebook.com/museumunicipal.alcanena', 'label' => 'Facebook', 'group' => 'social', 'type' => 'string'],
            ['key' => 'instagram_url', 'value' => '', 'label' => 'Instagram', 'group' => 'social', 'type' => 'string'],
            ['key' => 'twitter_url', 'value' => '', 'label' => 'Twitter', 'group' => 'social', 'type' => 'string'],
            ['key' => 'youtube_url', 'value' => '', 'label' => 'YouTube', 'group' => 'social', 'type' => 'string'],
            
            // SEO
            ['key' => 'site_title', 'value' => 'Museu Municipal de Alcanena', 'label' => 'Título do Site', 'group' => 'seo', 'type' => 'string'],
            ['key' => 'site_description', 'value' => 'Museu Municipal de Alcanena - Um espaço dedicado à história e cultura do concelho, com especial destaque para a indústria dos curtumes.', 'label' => 'Descrição do Site', 'group' => 'seo', 'type' => 'string'],
            ['key' => 'site_keywords', 'value' => 'museu, alcanena, curtumes, património, história, cultura, exposições', 'label' => 'Palavras-chave', 'group' => 'seo', 'type' => 'string'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }

        $this->command->info('Admin user created: admin@museu-alcanena.pt / admin123');
        $this->command->info('Default schedules created for summer and winter seasons.');
        $this->command->info('Default site settings created.');
    }
}
