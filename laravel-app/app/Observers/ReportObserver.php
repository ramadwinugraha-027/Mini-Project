<?php

namespace App\Observers;

use App\Models\Report;
use App\Models\ReportStatusLog;
use Illuminate\Support\Facades\Auth;

class ReportObserver
{
    public function updated(Report $report): void
    {
        if ($report->isDirty('status')) {
            ReportStatusLog::create([
                'report_id' => $report->id,
                'user_id' => Auth::id(),
                'previous_status' => $report->getOriginal('status'),
                'new_status' => $report->status,
            ]);
        }
    }
}