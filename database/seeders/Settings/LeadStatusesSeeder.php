<?php

namespace Database\Seeders\Settings;

use App\Models\Settings\LeadStatuses;
use Illuminate\Database\Seeder;

class LeadStatusesSeeder extends Seeder
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
                'step' => 1,
                'name' => 'Не обработан',
            ],
            [
                'step' => 2,
                'name' => 'Уточнение информации',
            ],
            [
                'step' => 3,
                'name' => 'Подбор вариантов',
            ],
            [
                'step' => 4,
                'name' => 'Качественный лид',
            ],
            [
                'step' => 5,
                'name' =>  'Не качественный лид',
            ],
        ];

        foreach ($statuses as $status)
            LeadStatuses::create($status);
    }
}
