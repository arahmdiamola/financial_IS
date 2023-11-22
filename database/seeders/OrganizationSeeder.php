<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use \App\Models\Organization;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Organization::create(['user_limit' => 3, 'name' => 'SSG', 'spend_monthly' => '1000']);
        Organization::create(['user_limit' => 3, 'name' => 'Registrar', 'spend_monthly' => '1000']);
    }
}
