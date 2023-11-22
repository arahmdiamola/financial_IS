<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use \App\Models\Categories;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categories::create(['user' => 1, 'name' => 'Salary', 'type' => 'income',  'budget' => '0', 'organization_id' => '1']);
        Categories::create(['user' => 1, 'name' => 'Rent', 'type' => 'expense',  'budget' => '0', 'organization_id' => '1']);
    }
}
