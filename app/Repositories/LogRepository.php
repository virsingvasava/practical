<?php

namespace App\Repositories;
use App\Models\Log;
use App\Repositories\Contracts\LogRepositoryInterface;

class LogRepository implements LogRepositoryInterface
{
    public function getAllLogs($perPage = 10)
    {
        return Log::orderBy('created_at', 'desc')->paginate($perPage);
    }

    public function createLog(array $data)
    {
        return Log::create($data);
    }
}
