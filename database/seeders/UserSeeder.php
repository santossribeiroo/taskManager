<?php

namespace Database\Seeders;

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
        if (!User::where('email', 'lucas@exemplo.com')->first()) {
            $superAdmin = User::create([
                'name' => 'Lucas Santos Ribeiro',
                'email' => 'lucas@exemplo.com',
                'password' => Hash::make('secret', ['rounds' => 12]),
            ]);
        }

        if (!User::where('email', 'admin@exemplo.com')->first()) {
            $admin = User::create([
                'name' => 'Administrador',
                'email' => 'admin@exemplo.com',
                'password' => Hash::make('secret', ['rounds' => 12]),
            ]);
        }

        if (!User::where('email', 'gaspar@exemplo.com')->first()) {
            $teacher = User::create([
                'name' => 'gaspar Santos Ribeiro',
                'email' => 'gaspar@exemplo.com',
                'password' => Hash::make('secret', ['rounds' => 12]),
            ]);
        }

        if (!User::where('email', 'enaldinho@exemplo.com')->first()) {
            $tutor = User::create([
                'name' => 'enaldinho Santos Ribeiro',
                'email' => 'enaldinho@exemplo.com',
                'password' => Hash::make('secret', ['rounds' => 12]),
            ]);
        }

        if (!User::where('email', 'rodriguinho@exemplo.com')->first()) {
            $student = User::create([
                'name' => 'rodriguinho Ribeiro',
                'email' => 'rodriguinho@exemplo.com',
                'password' => Hash::make('secret', ['rounds' => 12]),
            ]);
        }

        if (!User::where('email', 'vini@exemplo.com')->first()) {
            User::create([
                'name' => 'vini Ribeiro',
                'email' => 'vini@exemplo.com',
                'password' => Hash::make('secret', ['rounds' => 12]),
            ]);
        }
    }
}
