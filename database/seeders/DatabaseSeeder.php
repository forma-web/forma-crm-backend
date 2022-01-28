<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Database\Seeders\Settings\LeadSourcesSeeder;
use Database\Seeders\Settings\LeadStatusesSeeder;
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
            LeadStatusesSeeder::class,
            LeadSourcesSeeder::class,
        ]);

        Feedback::factory()->count(50)->create();
    }
}
