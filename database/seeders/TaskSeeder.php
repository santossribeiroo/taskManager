<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Task::where('title', 'Primeira tarefa' && 'project_id', '1')->first()) {
            Task::create([
                'user_id' => '1',
                'project_id' => '1',
                'title' => 'Primeira tarefa',
                'description' => 'Descrição da primeira tarefa',
                'priority' => 'low',
                'status' => 'in_progress',
            ]);
        }

        if (!Task::where('title', 'Segunda tarefa' && 'project_id', '1')->first()) {
            Task::create([
                'user_id' => '1',
                'project_id' => '1',
                'title' => 'Segunda tarefa',
                'description' => 'Descrição da Segunda tarefa',
                'priority' => 'medium',
                'status' => 'in_progress',
            ]);
        }

        if (!Task::where('title', 'Terceira tarefa' && 'project_id', '1')->first()) {
            Task::create([
                'user_id' => '1',
                'project_id' => '1',
                'title' => 'Terceira tarefa',
                'description' => 'Descrição da Terceira tarefa',
                'priority' => 'high',
                'status' => 'in_progress',
            ]);
        }

        if (!Task::where('title', 'Primeira tarefa' && 'project_id', '2')->first()) {
            Task::create([
                'user_id' => '1',
                'project_id' => '2',
                'title' => 'Primeira tarefa',
                'description' => 'Descrição da primeira tarefa',
                'priority' => 'low',
                'status' => 'in_progress',
            ]);
        }

        if (!Task::where('title', 'Segunda tarefa' && 'project_id', '2')->first()) {
            Task::create([
                'user_id' => '1',
                'project_id' => '2',
                'title' => 'Segunda tarefa',
                'description' => 'Descrição da Segunda tarefa',
                'priority' => 'medium',
                'status' => 'in_progress',
            ]);
        }

        if (!Task::where('title', 'Terceira tarefa' && 'project_id', '2')->first()) {
            Task::create([
                'user_id' => '1',
                'project_id' => '2',
                'title' => 'Terceira tarefa',
                'description' => 'Descrição da Terceira tarefa',
                'priority' => 'high',
                'status' => 'in_progress',
            ]);
        }
    }
}
