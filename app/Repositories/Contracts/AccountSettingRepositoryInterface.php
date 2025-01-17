<?php

namespace App\Repositories\Contracts;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

interface AccountSettingRepositoryInterface
{
    public function getAuthUserInfo();
    public function getById($id);
    public function update($id, array $data): bool;
    public function changePassword($id, $currentPassword, $newPassword);
    public function logout();
     
}