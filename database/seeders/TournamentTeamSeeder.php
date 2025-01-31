<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\TournamentTeam;

class TournamentTeamSeeder extends Seeder
{
    public function run(): void
    {
        $teams = [
            'Team India', 'Team Australia', 'Team England', 'Team Netherlands',
            'Team South Africa', 'Team New Zealand', 'Team Sri Lanka', 'Team West Indies'
        ];

        foreach ($teams as $team) {
            TournamentTeam::create(['name' => $team]);
        }
    }
}
