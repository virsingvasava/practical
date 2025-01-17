<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Contracts\AccountSettingRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAccountSettingRequest;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
Use App\Models\User;
Use Auth;

class AccountSettingController extends Controller
{

    protected $accountSettingRepository;

    public function __construct(AccountSettingRepositoryInterface $accountSettingRepository)
    {
        $this->accountSettingRepository = $accountSettingRepository;
    }

    public function profile()
    {
        $user = $this->accountSettingRepository->getAuthUserInfo();

        if (!$user) {
            return redirect()->route('admin.dashboard')->with('error', 'User not found.');
        }

        return view('admin.settings.profile', compact('user'));
    }

    public function update($id, UpdateAccountSettingRequest $request)
    {
        $this->accountSettingRepository->update($id, $request->validated());
        return redirect()->route('admin.dashboard')->with('success', 'Profile updated successfully.');
    }

    public function changePasswordForm()
    {
        $user = $this->accountSettingRepository->getAuthUserInfo();

        if (!$user) {
            return redirect()->route('admin.dashboard')->with('error', 'User not found.');
        }

        return view('admin.settings.changePassword', compact('user'));
    }

    public function changePassword($id, ChangePasswordRequest $request)
    {        
        $result = $this->accountSettingRepository->changePassword($id, $request->current_password, $request->password);
    
        if (isset($result['error'])) {
            return redirect()->back()->withErrors(['current_password' => $result['error']]);
        }
    
        return redirect()->route('admin.dashboard')->with('success', $result['success']);
    }

    public function logout(Request $request)
    {
        $this->accountSettingRepository->logout();
        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }
    

}
