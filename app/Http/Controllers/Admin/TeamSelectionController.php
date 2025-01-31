<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Http\Requests\StoreTeamWildCardRequest;
use App\Repositories\Contracts\TeamRepositoryInterface;
use App\Models\TournamentTeam;

class TeamSelectionController extends Controller
{
    protected $teamRepository;

    public function __construct(TeamRepositoryInterface $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }
    
    public function index(Request $request)
    {
        $teamsList = $this->teamRepository->getAllTeams();
        return view('admin.teams.index', compact('teamsList'));
    }

    public function edit(Request $request, $id)
    {
        $team = $this->teamRepository->getById($id);

        if (!$team) {
            return redirect()->route('admin.team.index')->with('error', 'Team not found.');
        }

        return view('admin.teams.edit', compact('team'));
    }

    public function update($id, UpdateTeamRequest $request)
    {
        $this->teamRepository->update($id, $request->validated());
        return redirect()->route('admin.team.index')->with('success', 'Team updated successfully.');
    }

    public function view(Request $request, $id)
    {
        $team = $this->teamRepository->getById($id);

        if (!$team) {
            return redirect()->route('admin.team.index')->with('error', 'Team not found.');
        }

        return view('admin.teams.view', compact('team'));
    }

    public function step1()
    {
        $teamsList = $this->teamRepository->getAllTeams();
        return view('admin.teams.step1', compact('teamsList'));
    }

    public function storeStep1(StoreTeamRequest $request)
    {
        $teams = $request->input('teams');

        if (count($teams) !== 8) {
            return response()->json([
                'success' => false,
                'message' => 'You must enter exactly 8 teams.'
            ], 400);
        }

        $this->teamRepository->createTeam($teams);

        return response()->json([
            'success' => true,
            'redirect' => route('admin.team.step2')
        ]);
    }

    public function step2()
    {
        //$teams = $this->teamRepository->getRandom4Teams(4);
        $teams =  TournamentTeam::inRandomOrder()->limit(4)->get();
        return view('admin.teams.step2', compact('teams'));
    }

    public function storeStep2(Request $request)
    {
        $teams = $this->teamRepository->getAllTeams();

        if ($teams->count() < 8) {
            return response()->json([
                'success' => false,
                'message' => 'You must have exactly 8 teams to proceed.'
            ], 400);
        }

        $winners = $this->teamRepository->selectWinners($teams);

        $this->teamRepository->deleteNonWinners($winners);

        return response()->json([
            'success' => true,
            'redirect' => route('admin.team.step3')
        ]);
    }

    public function step3()
    {      
        //$teams = $this->teamRepository->getRandom2Teams(2);
        $teams =  TournamentTeam::inRandomOrder()->limit(2)->get();
        return view('admin.teams.step3', compact('teams'));
    }

    public function storeStep3(StoreTeamWildCardRequest $request)
    {
        $teams = $this->teamRepository->getAllTeams();

        if ($teams->count() < 4) {
            return response()->json([
                'success' => false,
                'message' => 'You must have exactly 4 teams before proceeding.'
            ], 400);
        }

        $validated = $request->validate([
            'wildcards' => 'required|array|min:2|max:2',
            'wildcards.*' => 'required|string|max:255',
        ]);

        $this->teamRepository->addWildcardTeams($validated['wildcards']);

        return response()->json([
            'success' => true,
            'redirect' => route('admin.team.step4')
        ]);
    }

    public function step4()
    {
        //$teams = $this->teamRepository->getRandom2Teams(2);
        $teams =  TournamentTeam::inRandomOrder()->limit(2)->get();
        return view('admin.teams.step4', compact('teams'));
    }

    public function storeStep4(Request $request)
    {
        $teams = $this->teamRepository->getAllTeams();
        if ($teams->count() < 4) {
            return response()->json([
                'success' => false,
                'message' => 'You must have exactly 4 teams before proceeding.'
            ], 400);
        }

        $finalWinners = $teams->random(1);
        return response()->json([
            'success' => true,
            'redirect' => route('admin.team.step5')
        ]);
    }

    public function step5()
    {
       $winnerTeam = $this->teamRepository->getRandomWinner();
       return view('admin.teams.step5', compact('winnerTeam'));
    }

    public function destroy(Request $request)
    {
        $itemId = $request->input('id');

        try {
            $isDeleted = $this->teamRepository->delete($itemId);
            if ($isDeleted) {
                return response()->json([
                    'success' => true,
                    'message' => 'Item deleted successfully!',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Item not found or could not be deleted.',
                ], 404);
            }
        } catch (\Exception $e) {
            \Log::error('Failed to delete item: ', [
                'error' => $e->getMessage(),
                'itemId' => $itemId,
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the item. Please try again.',
            ], 500);
        }
    }
}
