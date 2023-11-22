<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use \App\Models\User;
use \App\Models\Account;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(['name' => 'Testing User', 'email' => 'test@test.com', 'password' => bcrypt('testing'),  'role' => '1', 'organization' => 1 ]);

        Account::create(['balance' => 10000, 'name' => 'GCASH', 'type' => 'eWallet',  'user' => 1, 'status' => 'active']);
    }
}
