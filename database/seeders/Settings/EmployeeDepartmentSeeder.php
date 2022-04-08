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
                'name' => 'Менеджеры',
            ],
            [
                'name' => 'Отдел разработки',
            ],
            [
                'name' => 'Менеджеры',
            ],
            [
                'name' => 'Менеджеры',
            ],
        ];

        foreach ($departments as $department)
            EmployeeDepartment::create($department);
    }
}
