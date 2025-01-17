<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $userArray = $this->userRepository->getAll();
        return view('admin.users.index', compact('userArray'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = $request->file('profile_picture');
        }
    
        $this->userRepository->create($data);
        return redirect()->route('admin.user.index')->with('success', 'User created successfully.');
    }

    public function update($id, UpdateUserRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = $request->file('profile_picture');
        }

        $this->userRepository->update($id, $data);
        return redirect()->route('admin.user.index')->with('success', 'User updated successfully.');
    }

    public function edit(Request $request, $id)
    {
        $user = $this->userRepository->getById($id);

        if (!$user) {
            return redirect()->route('admin.user.index')->with('error', 'User not found.');
        }

        return view('admin.users.edit', compact('user'));
    }

    public function view(Request $request, $id)
    {
        $user = $this->userRepository->getById($id);

        if (!$user) {
            return redirect()->route('admin.user.index')->with('error', 'User not found.');
        }

        return view('admin.users.view', compact('user'));
    }

    public function destroy(Request $request)
    {
        $itemId = $request->input('id');

        try {
            $isDeleted = $this->userRepository->delete($itemId);
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
