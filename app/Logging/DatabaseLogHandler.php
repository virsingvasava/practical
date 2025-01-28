<?php

namespace App\Logging;

use Monolog\Handler\AbstractProcessingHandler;
use App\Models\Log;

class DatabaseLogHandler extends AbstractProcessingHandler
{
    protected function write(array $record): void
    {
        Log::create([
            'user_id' => $record['context']['user_id'] ?? null,
            'role' => $record['context']['role'] ?? 'user',
            'message' => $record['message'],
            'url' => $record['context']['url'] ?? null,
            'method' => $record['context']['method'] ?? null,
            'params' => json_encode($record['context']['params'] ?? []),
            'ip' => $record['context']['ip'] ?? null,
            'user_agent' => $record['context']['user_agent'] ?? null,
        ]);
    }
}
