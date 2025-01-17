<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\File;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getAll()
    {
        return User::where('email', '!=', 'superadmin@gmail.com')->get();
    }

    public function getById($id)
    {
        return User::findOrFail($id);
    }

    public function create(array $data): User
    {
        if (isset($data['profile_picture'])) {
            $data['profile_picture'] = $this->uploadImage($data['profile_picture']);
        }
        return User::create($data);
    }

    public function update($id, array $data): bool
    {
        $user = $this->getById($id);
        if (isset($data['profile_picture'])) {
            if ($user->profile_picture && File::exists(public_path($user->profile_picture))) {
                File::delete(public_path($user->profile_picture));
            }
            $data['profile_picture'] = $this->uploadImage($data['profile_picture']);
        }
        unset($data['password']);
        return $user->update($data);
    }

    public function delete($id): bool
    {
        $user = $this->getById($id);
        if ($user->profile_picture && File::exists(public_path($user->profile_picture))) {
            File::delete(public_path($user->profile_picture));
        }
        return $user->delete();
    }

    private function uploadImage($image): string
    {
        $directory = public_path('profilePicture');
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }
        $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move($directory, $fileName);
        return 'profilePicture/' . $fileName;
    }
}
