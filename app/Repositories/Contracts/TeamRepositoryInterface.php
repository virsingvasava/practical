<?php

namespace App\Repositories\Contracts;

use App\Models\TournamentTeam;
use Illuminate\Support\Collection;

interface TeamRepositoryInterface
{
    public function getAllTeams();

    public function createTeam(array $data);

    public function updateTeamStatus($teamId, $status);

    public function getTeamsByStatus($status);

    public function addWildCardTeams(array $wildcards);

    public function getFinalWinner();

    public function getById($id);

    public function update($id, array $data): bool;

    public function delete($id): bool;

    public function selectWinners(Collection $teams, int $numberOfWinners = 4): Collection;

    public function deleteNonWinners(Collection $winners): void;

    public function getRandom4Teams(int $limit = 4): Collection;

    public function getRandom2Teams(int $limit = 2): Collection;

    public function getRandomWinner();
}
