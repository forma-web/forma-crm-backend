<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Database\Seeders\Settings\EmployeeDepartmentSeeder;
use Database\Seeders\Settings\EmployeeOfficeSeeder;
use Database\Seeders\Settings\EmployeePermissionSeeder;
use Database\Seeders\Settings\EmployeePositionSeeder;
use Database\Seeders\Settings\LeadSourceSeeder;
use Database\Seeders\Settings\LeadStatusSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LeadStatusSeeder::class,
            LeadSourceSeeder::class,
            EmployeeOfficeSeeder::class,
            EmployeeDepartmentSeeder::class,
            EmployeePositionSeeder::class,
            EmployeePermissionSeeder::class,
        ]);

        Feedback::factory()->count(50)->create();
    }
}
