<?php

namespace App\Repositories;


use App\Models\TournamentTeam;
use Illuminate\Support\Facades\File;
use App\Repositories\Contracts\TeamRepositoryInterface;
use Illuminate\Support\Collection;

class TeamRepository implements TeamRepositoryInterface {

     public function getAllTeams()
     {
         return TournamentTeam::all();
     }

     public function getById($id)
    {
        return TournamentTeam::findOrFail($id);
    }

     public function createTeam(array $teams)
    {
        foreach ($teams as $teamName) {
            TournamentTeam::create([
                'name' => $teamName,
                'status' => 'pending'
            ]);
        }
    }

    public function selectWinners(Collection $teams, int $numberOfWinners = 4): Collection
    {
        return $teams->random($numberOfWinners);
    }

    public function deleteNonWinners(Collection $winners): void
    {
        TournamentTeam::whereNotIn('id', $winners->pluck('id'))->delete();
    }
 
     public function updateTeamStatus($teamId, $status)
     {
         return TournamentTeam::where('id', $teamId)->update(['status' => $status]);
     }
 
     public function getTeamsByStatus($status)
     {
         return TournamentTeam::where('status', $status)->get();
     }
 
     public function addWildCardTeams(array $wildcards)
     {
         foreach ($wildcards as $wildcard) {
            TournamentTeam::where('name', $wildcard)->update(['status' => 'wildcard']);
         }
     }
 
     public function getFinalWinner()
     {
         return TournamentTeam::where('status', 'winner')->first();
     }

     public function update($id, array $data): bool
     {
         $team = $this->getById($id);
         return $team->update($data);
     }

     public function delete($id): bool
     {
         $team = $this->getById($id);
         return $team->delete();
     }

    public function getRandom4Teams(int $limit = 4): Collection
    {
        return TournamentTeam::inRandomOrder()->limit($limit)->get();
    }

    public function getRandom2Teams(int $limit = 2): Collection
    {
        return TournamentTeam::inRandomOrder()->limit($limit)->get();
    }

    public function getRandomWinner()
    {
        return TournamentTeam::inRandomOrder()->first();
    }
}
