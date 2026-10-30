<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ReportController extends Controller
{
    public function create(): View
    {
        $schools = School::orderBy('name')->get();

        return view('create', compact('schools'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'school_id' => ['required', 'exists:schools,id'],
            'mbg_distribution_id' => ['required', 'exists:mbg_distributions,id'],
            'incident_date' => ['required', 'date'],
            'affected_count' => ['required', 'integer', 'min:1'],
            'symptoms_description' => ['required', 'string'],
            'evidence' => ['nullable', 'file'],
        ]);

        $evidencePath = null;
        if ($request->hasFile('evidence')) {
            $evidencePath = $request->file('evidence')->store('evidence', 'public');
        }

        Report::create([
            'user_id' => Auth::id(),
            'school_id' => $validated['school_id'],
            'mbg_distribution_id' => $validated['mbg_distribution_id'],
            'incident_date' => $validated['incident_date'],
            'affected_count' => $validated['affected_count'],
            'symptoms_description' => $validated['symptoms_description'],
            'evidence_path' => $evidencePath,
            'status' => 'diajukan',
        ]);

        return redirect()->route('dashboard')->with('success', 'Laporan kejadian berhasil dikirim dan tersimpan.');
    }
}