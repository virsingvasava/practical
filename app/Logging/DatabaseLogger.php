<?php

namespace App\Logging;

use Illuminate\Log\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;
use App\Models\Log;

class DatabaseLogger
{
    public function __invoke(array $config)
    {
        return new Logger('database', [
            new DatabaseLogHandler(),
        ]);
    }
}
