<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientRole = Role::where('slug', 'client')->first();
        $employeeRole = Role::where('slug', 'employee')->first();
        $adminRole = Role::where('slug', 'admin')->first();

        // Create client users
        $client1 = User::create([
            'first_name' => 'Jonas',
            'last_name' => 'Jonaitis',
            'email' => 'jonas@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $client1->roles()->attach($clientRole);

        $client2 = User::create([
            'first_name' => 'Petras',
            'last_name' => 'Petraitis',
            'email' => 'petras@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $client2->roles()->attach($clientRole);

        // Create employee user
        $employee = User::create([
            'first_name' => 'Marija',
            'last_name' => 'Marijaitė',
            'email' => 'marija@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $employee->roles()->attach($employeeRole);

        // Create admin user
        $admin = User::create([
            'first_name' => 'Admin',
            'last_name' => 'Administratorius',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $admin->roles()->attach($adminRole);
    }
}
