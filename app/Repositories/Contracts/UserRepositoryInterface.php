<?php

namespace App\Repositories\Contracts;
use App\Models\User;

interface UserRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function create(array $data): User;
    public function update($id, array $data): bool;
    public function delete($id): bool;
}
