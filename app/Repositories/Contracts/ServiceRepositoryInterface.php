<?php

namespace App\Repositories\Contracts;
use App\Models\Service;

interface ServiceRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function create(array $data): Service;
    public function update($id, array $data): bool;
    public function delete($id): bool;
    
}
