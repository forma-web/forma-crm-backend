<?php

namespace Database\Seeders\Settings;

use App\Models\Settings\EmployeePosition;
use Illuminate\Database\Seeder;

class EmployeePositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            [
                'name' => 'Админ',
            ],
            [
                'name' => 'Руководитель',
            ],
            [
                'name' => 'Менеджер',
            ],
        ];

        foreach ($positions as $position)
            EmployeePosition::create($position);
    }
}
