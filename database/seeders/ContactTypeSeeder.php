<?php

namespace Database\Seeders;

use App\Models\ContactType;
use Illuminate\Database\Seeder;

class ContactTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => 'email',
                'pattern' => '^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$',
            ],
            [
                'name' => 'facebook',
                'pattern' => '^https:\/\/www\.facebook\.com\/[a-zA-Z0-9.]+$',
            ],
            [
                'name' => 'twitter',
                'pattern' => '^https:\/\/twitter\.com\/[a-zA-Z0-9]+$',
            ],
            [
                'name' => 'instagram',
                'pattern' => '^https:\/\/www\.instagram\.com\/[a-zA-Z0-9_.]+$',
            ],
            [
                'name' => 'telegram',
                'pattern' => '^https:\/\/t\.me\/[a-zA-Z0-9_.]+$',
            ],
        ];

        foreach ($types as $type) {
            ContactType::create($type);
        }
    }
}
