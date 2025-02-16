<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Project::where('name', 'Teste')->first()) {
            Project::create([
                'user_id' => '1',
                'name' => 'Teste',
                'description' => 'Uma descrição qualquer',
                'start_date' => '2025-02-15',
                'end_date' => '2026-02-15',
                'status' => 'in_progress',
            ]);
        }

        if (!Project::where('name', 'Projeto')->first()) {
            Project::create([
                'user_id' => '2',
                'name' => 'Projeto',
                'description' => 'Uma descrição qualquer do projeto',
                'start_date' => '2025-02-15',
                'end_date' => '2028-02-15',
                'status' => 'in_progress',
            ]);
        }
    }
}
