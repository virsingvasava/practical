<?php

namespace App\Repositories\Contracts;

interface LogRepositoryInterface
{
    public function getAllLogs($perPage = 10);
    public function createLog(array $data);
}
