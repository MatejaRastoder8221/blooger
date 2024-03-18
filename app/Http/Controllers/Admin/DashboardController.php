<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }

        $logs = [];

        // Read the admin log file
        $logFilePath = storage_path('logs/admin.log');
        $logContents = File::exists($logFilePath) ? File::get($logFilePath) : '';

        // Parse log entries
        $logs = collect(explode("\n", $logContents))
            ->filter()
            ->map(function ($logLine) {
                $parts = explode('] ', $logLine, 2);
                if (count($parts) == 2) {
                    $date = trim($parts[0], '[]');
                    $text = $parts[1];
                    return [
                        'date' => $date,
                        'text' => $text,
                    ];
                }
                return null;
            })
            ->filter();

        return view('admin.dashboard', compact('logs'));
    }
}
