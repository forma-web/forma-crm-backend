<?php

namespace Database\Seeders\Settings;

use App\Models\Settings\LeadStatus;
use Illuminate\Database\Seeder;

class LeadStatusSeeder extends Seeder
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
                'name' => 'Не обработан',
            ],
            [
                'name' => 'Уточнение информации',
            ],
            [
                'name' => 'Подбор вариантов',
            ],
            [
                'name' => 'Качественный лид',
            ],
            [
                'name' =>  'Не качественный лид',
            ],
        ];

        foreach ($statuses as $status)
            LeadStatus::create($status);
    }
}
