<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\File;
use App\Repositories\Contracts\AccountSettingRepositoryInterface;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\SessionManager;

class AccountSettingRepository implements AccountSettingRepositoryInterface
{
    
    protected $session;

    public function __construct(SessionManager $session)
    {
        $this->session = $session;
    }

    public function getAuthUserInfo()
    {
        return Auth::user();
    }

    public function getById($id)
    {
        return User::findOrFail($id);
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


    public function changePassword($id, $currentPassword, $newPassword)
    {
        $user = $this->getById($id);
        if (!$user) {
            return ['error' => 'User not found.'];
        }
        if (!Hash::check($currentPassword, $user->password)) {
            return ['error' => 'The current password is incorrect.'];
        }
        $user->password = Hash::make($newPassword);
        $user->save();
        return ['success' => 'Password updated successfully.'];
    }

    public function logout()
    {
        Auth::logout();
        $this->session->invalidate();
        $this->session->regenerateToken();
        return true;
    }
}