<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name'              => 'Admin',
                'email'             => 'admin@cogan.com',
                'email_verified_at' => now()->toDateTimeString(),
                'password'          => Hash::make('admin'),
                // 'role'              => 'Admin',
                'created_at'        => now()->toDateTimeString(),
                'updated_at'        => now()->toDateTimeString(),
            ],
            [
                'name'              => 'Zoel',
                'email'             => 'zoel@cogan.com',
                'email_verified_at' => now()->toDateTimeString(),
                'password'          => Hash::make('zoel'),
                // 'role'              => 'User',
                'created_at'        => now()->toDateTimeString(),
                'updated_at'        => now()->toDateTimeString(),
            ],
            [
                'name'              => 'Thumbfun',
                'email'             => 'thumbfun@cogan.com',
                'email_verified_at' => now()->toDateTimeString(),
                'password'          => Hash::make('1111'),
                // 'role'              => 'User',
                'created_at'        => now()->toDateTimeString(),
                'updated_at'        => now()->toDateTimeString(),
            ],

        ]);

        // User::where('name', 'Admin')->first()->syncRoles('Admin');
        // User::where('name', 'Zoel')->first()->syncRoles('User');
    }
}
