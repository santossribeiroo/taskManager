<?php

namespace Database\Seeders;

use App\Models\ProjectTeam;
use Illuminate\Database\Seeder;

class ProjectTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!ProjectTeam::where('project_id', '1' && 'user_id', '2')->first()) {
            ProjectTeam::create([
                'project_id' => '1',
                'user_id' => '2',
                'role' => 'Member',
            ]);
        }

        if (!ProjectTeam::where('project_id', '1' && 'user_id', '3')->first()) {
            ProjectTeam::create([
                'project_id' => '1',
                'user_id' => '3',
                'role' => 'Member',
            ]);
        }

        if (!ProjectTeam::where('project_id', '1' && 'user_id', '4')->first()) {
            ProjectTeam::create([
                'project_id' => '1',
                'user_id' => '4',
                'role' => 'Member',
            ]);
        }

        if (!ProjectTeam::where('project_id', '2' && 'user_id', '2')->first()) {
            ProjectTeam::create([
                'project_id' => '2',
                'user_id' => '2',
                'role' => 'Member',
            ]);
        }

        if (!ProjectTeam::where('project_id', '2' && 'user_id', '3')->first()) {
            ProjectTeam::create([
                'project_id' => '2',
                'user_id' => '3',
                'role' => 'Member',
            ]);
        }

        if (!ProjectTeam::where('project_id', '2' && 'user_id', '4')->first()) {
            ProjectTeam::create([
                'project_id' => '2',
                'user_id' => '4',
                'role' => 'Member',
            ]);
        }
    }
}
