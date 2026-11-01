<?php

namespace App\Policies;

use App\Models\Report;
use App\Models\User;

class ReportPolicy
{
    public function view(User $user, Report $report): bool
    {
        if ($user->isPemantau() || $user->isKoordinator()) {
            return true;
        }

        return $report->user_id === $user->id;
    }

    public function update(User $user, Report $report): bool
    {
        return $report->user_id === $user->id && $report->status === 'diajukan';
    }

    public function review(User $user, Report $report): bool
    {
        return $user->isPemantau() && $report->status === 'diajukan';
    }

    public function forward(User $user, Report $report): bool
    {
        return $user->isKoordinator() && in_array($report->status, ['ditinjau', 'diteruskan']);
    }
}