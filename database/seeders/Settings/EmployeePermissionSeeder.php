<?php

namespace Database\Seeders\Settings;

use App\Models\Settings\EmployeePermission;
use Illuminate\Database\Seeder;

class EmployeePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'title' => 'Просмотр настроек',
                'description' => '',
                'slug' => 'view:settings',
            ],
            [
                'title' => 'Редактирование настроек',
                'description' => '',
                'slug' => 'edit:settings',
            ],
            [
                'title' => 'Добавление лидов',
                'description' => '',
                'slug' => 'add:leads',
            ],
        ];

        foreach ($permissions as $permission)
            EmployeePermission::create($permission);
    }
}
