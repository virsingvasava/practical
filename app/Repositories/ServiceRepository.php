<?php

namespace App\Repositories;

use App\Models\Service;
use App\Repositories\Contracts\ServiceRepositoryInterface;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function getAll()
    {
        return Service::all();
    }

    public function getById($id)
    {
        return Service::findOrFail($id);
    }

    public function create(array $data): Service
    {
        return Service::create($data);
    }

    public function update($id, array $data): bool
    {
        $service = $this->getById($id);
        return $service->update($data);
    }

    public function delete($id): bool
    {
        $service = $this->getById($id);
        return $service->delete();
    }
}
