<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a default admin account for development/testing
        Admin::updateOrCreate(
            ['username' => 'admin'],
            ['password' => Hash::make('secret')]
        );
    }
}
