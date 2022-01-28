<?php

namespace Database\Seeders\Settings;

use App\Models\Settings\LeadSources;
use Illuminate\Database\Seeder;

class LeadSourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'name' => 'Звонок',
            ],
            [
                'name' => 'Электронная почта',
            ],
            [
                'name' => 'Веб-сайт',
            ],
            [
                'name' => 'Обратный звонок',
            ],
            [
                'name' =>  'VK',
            ],
            [
                'name' =>  'Telegram',
            ],
            [
                'name' =>  'OK',
            ],
            [
                'name' =>  'Instagram',
            ],
            [
                'name' =>  'Facebook',
            ],
            [
                'name' =>  'WhatsApp',
            ],
        ];

        foreach ($statuses as $status)
            LeadSources::create($status);
    }
}
