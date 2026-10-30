<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function create(): View
    {
        $schools = School::orderBy('name')->get();

        return view('create', compact('schools'));
    }
}