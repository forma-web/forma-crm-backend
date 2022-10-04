<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Feedback;
use App\Models\Lead;
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

//        Feedback::factory()->count(50)->create();
        Employee::factory()->count(100)->create([
            'position_id' => 1,
            'department_id' => 1,
            'office_id' => 1,
        ]);

        Employee::create([
            'position_id' => 1,
            'department_id' => 1,
            'office_id' => 1,
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'middle_name' => 'Admin',
            'birth_date' => '1990-01-01',
            'hire_date' => '2020-01-01',
            'email' => 'tes@test.com',
            'phone' => '123456789',
            'sex' => 'M',
            'password' => \Hash::make('password'),
        ]);

//        Lead::factory()->count(10)->create([
//            'manager_id' => 1,
//            'status_id' => 1,
//            'source_id' => 1,
//        ]);
    }
}
