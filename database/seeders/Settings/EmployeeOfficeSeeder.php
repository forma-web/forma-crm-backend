<?php

namespace Database\Seeders\Settings;

use App\Models\Settings\EmployeeOffice;
use Illuminate\Database\Seeder;

class EmployeeOfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offices = [
            [
                'name' => 'Офис Колпашево',
                'location' => 'г. Колпашево, ул. Победы, д. 40',
            ],
            [
                'name' => 'Офис Томск',
                'location' => 'г. Томск, ул. Ленина, д. 40',
            ],
            [
                'name' => 'Офис Новосибирск',
                'location' => 'г. Новосибирск, ул. Ватутина, д. 40',
            ],
        ];

        foreach ($offices as $office)
            EmployeeOffice::create($office);
    }
}
