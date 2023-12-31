<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use \App\Models\role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        role::create(['name' => 'Admin', 'user' => 1 ]);
        role::create(['name' => 'Normal User', 'user' => 1 ]);
    }
}
