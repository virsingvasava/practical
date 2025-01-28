<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Contracts\LogRepositoryInterface;

class LogController extends Controller
{
    protected $logRepository;

    public function __construct(LogRepositoryInterface $logRepository)
    {
        $this->logRepository = $logRepository;
    }

    public function index()
    {
        $logs = $this->logRepository->getAllLogs(10);

        return view('admin.logs.index', compact('logs'));
    } 
}
