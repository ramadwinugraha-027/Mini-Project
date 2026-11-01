<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RekapController extends Controller
{
    public function index(Request $request): View
    {
        $schools = School::orderBy('name')->get();

        $query = Report::with(['school', 'mbgDistribution', 'user'])->latest();

        if ($request->filled('school_id')) {
            $query->where('school_id', $request->school_id);
        }

        $totalReports = (clone $query)->count();
        $inProgressReports = (clone $query)->whereIn('status', ['diajukan', 'ditinjau', 'diteruskan'])->count();
        $completedReports = (clone $query)->where('status', 'selesai')->count();

        $reports = $query->paginate(5)->withQueryString();

        return view('rekap', compact(
            'schools',
            'reports',
            'totalReports',
            'inProgressReports',
            'completedReports'
        ));
    }
}