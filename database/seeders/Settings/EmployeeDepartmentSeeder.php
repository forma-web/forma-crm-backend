<?php

namespace Database\Seeders\Settings;

use App\Models\Settings\EmployeeDepartment;
use Illuminate\Database\Seeder;

class EmployeeDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            [
                'office_id' => 1,
                'name' => 'Менеджеры',
            ],
            [
                'office_id' => 1,
                'name' => 'Отдел разработки',
            ],
            [
                'office_id' => 2,
                'name' => 'Менеджеры',
            ],
            [
                'office_id' => 3,
                'name' => 'Менеджеры',
            ],
        ];

        foreach ($departments as $department)
            EmployeeDepartment::create($department);
    }
}
